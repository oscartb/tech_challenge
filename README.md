#Zinio  | Tech Challenge

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