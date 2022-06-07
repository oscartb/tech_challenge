# Zinio  | Tech Challenge

###  👩‍💻 Installation

* `cp Infrastructure/docker-compose.yml.dist  Infrastructure/docker-compose.yml`
* `cd Infrastructure`
* `docker-compose up`
* `make composer-install`
* `make be-warmup`

Database connection details:
```
user and password: root => root
host port: 3666
database name: zinio_db
```

### Second iteration objective
After a few days, I revisited the challenge, and I found things I'd like to improve. One thing I've learned is that before close a project like that you need a couple of days and look at it with a fresh perspective.

**Main goals:**

* Add VOs in order to avoid primitive obsession.
* Complete the testing suite. 
* Cleanliness. Remove comments and unused stuff :/
* Revisit Doctrine's entity manager decorator. I never did a think like that before. For sure there are better ways. Take a look and analyze.
* Coherence, if I passed the entity repository to almost every application service, I should do it in all of them and do not get the repository from the manager. 
* Use  strategy pattern to generate names using multiple strategies
* Improve the Readme, was poor.

### Explanation about some technical decisions
I decided to invest time doing a CQRS application and trying to respect SOLID principles. I was asked about related terminology in the technical interview I had, so I think is worth it.

The file structure is layer first. For small projects I think is better because is easy to navigate. In a bigger project, a context first structure makes more sense.

The relation between cards and decks I think is OK for the challenge but, in a real application we need to consider alternatives.

### 👷 Use case comments
When removing a card we are not deleting it,  instead we are marking the card for removal. Cards marked for removal can't be included in a new deck (randomize process), so we can re-randomize all decks containing the marked card.

In future developments,  I would make a process to get those marked for removal cards and export them to keep an historical and then remove them from the database.

### Comments about commit _`6afd4da06c3f8ce960a24611a3493413ed4c3848`_
I tried to decouple the code from doctrine using a decorator. It is not possible to extend the Entity manager as stated in the class itself:
```
 * You should never attempt to inherit from the EntityManager: Inheritance
 * is not a valid extension point for the EntityManager. Instead you
 * should take a look at the {@see \Doctrine\ORM\Decorator\EntityManagerDecorator}
 * and wrap your entity manager in a decorator.
 */
```
I never did it before. In a real project I would do a lot of research before taking a decision like this one.

* How I did it  in the past:

Saving in repository:
```
class GameRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Game::class);
    }

    public function save(Game $game, $user = null): void
    {
        $game->record(new GameWasCreatedMessage($game, $user));
        $game->setEntityIsReadyToPersist(true);
        $this->_em->persist($game);
        $this->_em->flush();
    }
```
This way we have to be sure the entity is always saved using the save method, so we add a prop "setEntityIsReadyToPersist" to check it and throw an error otherwise.
```
public function preFlush(PreFlushEventArgs $args): void
{
        [...]
        foreach ($entities as $entity) {
            [...]
            if(in_array(EntityWithSaveMethodInterface::class, class_implements($entity), true) && $entity->getEntityIsReadyToPersist() === false){
                throw new \Exception(sprintf('Entity %s cannot be saved directly. Use the save method', get_class($entity)), 400);
            }

            $this->entities->add($entity);
        }
    }
```
Dispatching stored domain events using doctrine lifecycle events
```
    public function postFlush(PostFlushEventArgs $args): void
    {
        $events = new ArrayCollection();
        foreach ($this->entities as $entity) {
            foreach ($entity->getRecordedEvents() as $domainEvent) {
                $events->add($domainEvent);
            }
            $entity->clearRecordedEvents();
        }
        foreach ($events as $event) {
            $this->bus->dispatch($event);
        }
    }
```


### 👀 API documentation
A simple HTML page will fetch the documentation from the Open API specifications.
[http://localhost:260/api/index.html](http://localhost:260/api/index.html)


You can find those specifications here:  Code/src/Infrastructure/UI/RestAPI/Spec

###  Future improvements
* More unit tests
* Improve validation
* Acceptance tests. We have codeception installed in a branch and a basic test, but I don't have time to do it right so is not merged.

### Reference 📖
I've taken ideas from many places:
* https://github.com/CodelyTV/php-ddd-example/tree/main/src
* https://github.com/fjogeleit/symfony-cqrs/
* https://refactoring.guru/design-patterns