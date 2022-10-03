<?php
declare(strict_types=1);

namespace W4Services\W4OrganizationList\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class OrganizationTest extends UnitTestCase
{
    /**
     * @var \W4Services\W4OrganizationList\Domain\Model\Organization|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \W4Services\W4OrganizationList\Domain\Model\Organization::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription(): void
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('description'));
    }

    /**
     * @test
     */
    public function getLinkReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getLink()
        );
    }

    /**
     * @test
     */
    public function setLinkForStringSetsLink(): void
    {
        $this->subject->setLink('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('link'));
    }

    /**
     * @test
     */
    public function getEmailReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailForStringSetsEmail(): void
    {
        $this->subject->setEmail('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('email'));
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName(): void
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('name'));
    }

    /**
     * @test
     */
    public function getStreetReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getStreet()
        );
    }

    /**
     * @test
     */
    public function setStreetForStringSetsStreet(): void
    {
        $this->subject->setStreet('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('street'));
    }

    /**
     * @test
     */
    public function getZipReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getZip()
        );
    }

    /**
     * @test
     */
    public function setZipForStringSetsZip(): void
    {
        $this->subject->setZip('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('zip'));
    }

    /**
     * @test
     */
    public function getCityReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getCity()
        );
    }

    /**
     * @test
     */
    public function setCityForStringSetsCity(): void
    {
        $this->subject->setCity('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('city'));
    }

    /**
     * @test
     */
    public function getFunctionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getFunction()
        );
    }

    /**
     * @test
     */
    public function setFunctionForStringSetsFunction(): void
    {
        $this->subject->setFunction('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('function'));
    }

    /**
     * @test
     */
    public function getMobileReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getMobile()
        );
    }

    /**
     * @test
     */
    public function setMobileForStringSetsMobile(): void
    {
        $this->subject->setMobile('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('mobile'));
    }

    /**
     * @test
     */
    public function getPhoneReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getPhone()
        );
    }

    /**
     * @test
     */
    public function setPhoneForStringSetsPhone(): void
    {
        $this->subject->setPhone('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('phone'));
    }

    /**
     * @test
     */
    public function getCheckboxDeleteReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getCheckboxDelete()
        );
    }

    /**
     * @test
     */
    public function setCheckboxDeleteForStringSetsCheckboxDelete(): void
    {
        $this->subject->setCheckboxDelete('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('checkboxDelete'));
    }

    /**
     * @test
     */
    public function getImagesReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getImages()
        );
    }

    /**
     * @test
     */
    public function setImagesForFileReferenceSetsImages(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImages($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('images'));
    }

    /**
     * @test
     */
    public function getFeCruserReturnsInitialValueForFrontendUser(): void
    {
    }

    /**
     * @test
     */
    public function setFeCruserForFrontendUserSetsFeCruser(): void
    {
    }

    /**
     * @test
     */
    public function getCategoriesReturnsInitialValueForCategory(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getCategories()
        );
    }

    /**
     * @test
     */
    public function setCategoriesForObjectStorageContainingCategorySetsCategories(): void
    {
        $category = new \TYPO3\CMS\Extbase\Domain\Model\Category();
        $objectStorageHoldingExactlyOneCategories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneCategories->attach($category);
        $this->subject->setCategories($objectStorageHoldingExactlyOneCategories);

        self::assertEquals($objectStorageHoldingExactlyOneCategories, $this->subject->_get('categories'));
    }

    /**
     * @test
     */
    public function addCategoryToObjectStorageHoldingCategories(): void
    {
        $category = new \TYPO3\CMS\Extbase\Domain\Model\Category();
        $categoriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $categoriesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($category));
        $this->subject->_set('categories', $categoriesObjectStorageMock);

        $this->subject->addCategory($category);
    }

    /**
     * @test
     */
    public function removeCategoryFromObjectStorageHoldingCategories(): void
    {
        $category = new \TYPO3\CMS\Extbase\Domain\Model\Category();
        $categoriesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $categoriesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($category));
        $this->subject->_set('categories', $categoriesObjectStorageMock);

        $this->subject->removeCategory($category);
    }
}
