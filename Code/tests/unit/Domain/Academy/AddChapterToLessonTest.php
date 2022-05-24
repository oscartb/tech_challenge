<?php

namespace App\Tests\unit\Domain\PropertyManagement;

use App\Domain\Academy\Entity\Chapter;
use App\Domain\Academy\Entity\Lesson;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AddChapterToLessonTest extends KernelTestCase
{

    public function testAddChapterToLesson()
    {
        $chapter =  new Chapter('Chapter 1');
        $lesson = new Lesson('Lesson 1');
        $chapter->addLesson($lesson);

        $lessonRepository = $this->createMock(ObjectRepository::class);

        $lessonRepository->expects($this->any())
            ->method('find')
            ->willReturn($lesson);

        $lesson = $lessonRepository->find(24);
        $this->assertInstanceOf(Chapter::class, $lesson->getChapter());
    }
}