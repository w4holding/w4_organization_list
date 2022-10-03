<?php
declare(strict_types=1);

namespace W4Services\W4OrganizationList\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 */
class OrganizationControllerTest extends UnitTestCase
{
    /**
     * @var \W4Services\W4OrganizationList\Controller\OrganizationController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\W4Services\W4OrganizationList\Controller\OrganizationController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllOrganizationsFromRepositoryAndAssignsThemToView(): void
    {
        $allOrganizations = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $organizationRepository = $this->getMockBuilder(\W4Services\W4OrganizationList\Domain\Repository\OrganizationRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $organizationRepository->expects(self::once())->method('findAll')->will(self::returnValue($allOrganizations));
        $this->subject->_set('organizationRepository', $organizationRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('organizations', $allOrganizations);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenOrganizationToOrganizationRepository(): void
    {
        $organization = new \W4Services\W4OrganizationList\Domain\Model\Organization();

        $organizationRepository = $this->getMockBuilder(\W4Services\W4OrganizationList\Domain\Repository\OrganizationRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $organizationRepository->expects(self::once())->method('add')->with($organization);
        $this->subject->_set('organizationRepository', $organizationRepository);

        $this->subject->createAction($organization);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenOrganizationToView(): void
    {
        $organization = new \W4Services\W4OrganizationList\Domain\Model\Organization();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('organization', $organization);

        $this->subject->editAction($organization);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenOrganizationInOrganizationRepository(): void
    {
        $organization = new \W4Services\W4OrganizationList\Domain\Model\Organization();

        $organizationRepository = $this->getMockBuilder(\W4Services\W4OrganizationList\Domain\Repository\OrganizationRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $organizationRepository->expects(self::once())->method('update')->with($organization);
        $this->subject->_set('organizationRepository', $organizationRepository);

        $this->subject->updateAction($organization);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenOrganizationFromOrganizationRepository(): void
    {
        $organization = new \W4Services\W4OrganizationList\Domain\Model\Organization();

        $organizationRepository = $this->getMockBuilder(\W4Services\W4OrganizationList\Domain\Repository\OrganizationRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $organizationRepository->expects(self::once())->method('remove')->with($organization);
        $this->subject->_set('organizationRepository', $organizationRepository);

        $this->subject->deleteAction($organization);
    }
}
