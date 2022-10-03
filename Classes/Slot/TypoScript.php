<?php

namespace W4Services\W4OrganizationList\Slot;

class TypoScript {

    public function includeTypoScript( &$packages) {

        array_splice(
            $packages,
            0,
            0,
            'w4_organization_list'
        );

    }

}
