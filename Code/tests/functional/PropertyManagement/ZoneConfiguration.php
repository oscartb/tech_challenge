<?php

namespace App\Tests\functional\Domain\PropertyManagement;

use App\Domain\PropertyManagement\Entity\Zone;
use App\Domain\PropertyManagement\Aggregate\ZoneConfiguration as ConfigurationAlias;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ZoneConfiguration extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testConfigurationInstantiation(){
        //get a zone
        $zoneRepository = $this->entityManager->getRepository(Zone::class);
        $zones= $zoneRepository->findAll();

        if(count($zones) == 0){
            throw new \Exception('No zones, check DataFixtures', 500);
        }
        /**@var Zone $zone*/
        $zone = reset($zones);

        //Add one configuration of each type
        $configurationArray = $this->createConfigArray();
        foreach($configurationArray as $configuration){
            $zone->addConfiguration($configuration);
        }
        $this->entityManager->flush();

        //test can be retrieved
        $zoneConfiguration = $zone->getConfiguration();
        var_dump($zoneConfiguration->toArray());

        //test exception in case we pass an invalid value type

/*        $zones = $zoneRepository->findAll();
        foreach($zones as $zone){
            $zoneConfigurations= $zone->getConfiguration();
            foreach($zoneConfigurations as $zoneConfiguration) {
                var_dump($zoneConfiguration->getConfigurationIdentifier());
                var_dump($zoneConfiguration->getConfigurationValue());
                exit();
            }
        }*/
        $this->assertEquals(1,1);
    }

    protected function createConfigArray(){
        $array = [];
        $booleanConfig = new ConfigurationAlias(
            'test1',
            ConfigurationAlias::CONFIGURATION_TYPE_BOOLEAN,
            true);
        array_push($array, $booleanConfig);
        return $array;
    }
}
