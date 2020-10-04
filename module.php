<?php

/**
 * Example module.
 */

declare(strict_types=1);

namespace Ghezibde;

use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;

return new class extends AbstractModule implements ModuleCustomInterface {
    use ModuleCustomTrait;

    /**
     * How should this module be identified in the control panel, etc.?
     *
     * @return string
     */
    public function title(): string
    {
        return 'Ghezibde';
    }

    /**
     * A sentence describing what this module does.
     *
     * @return string
     */
    public function description(): string
    {
        return 'Modifications for Ghezibde';
    }

    /**
     * The person or organisation who created this module.
     *
     * @return string
     */
    public function customModuleAuthorName(): string
    {
        return 'Greg Roach';
    }

    /**
     * Additional/updated translations.
     *
     * @param string $language
     *
     * @return string[]
     */
    public function customTranslations(string $language): array
    {
        switch ($language) {
            case 'en-GB':
            case 'en-US':
                return [
                    'My page'          => 'My Ghezibde',
                    'webtrees Message' => 'Ghezibde message',
                    'No children'      => 'No recorded children'
                ];

            case 'fr':
                return [
                    'My page'                                            => 'Mon Ghezibde',
                    'webtrees message'                                   => 'Message Ghezibde',
                    'No children'                                        => 'Aucun enfant encore recensé',
                    'You sent the following message to a webtrees user:' => 'Vous avez envoyé le message suivant à l’utilisateur Ghezibde',
                    'The username or password is incorrect.'             => 'L’identifiant ou le mot de passe que vous avez utilisé est erroné. Ré-essayer ou demandez un nouveau mot de passe.',
                ];

            case 'nl':
                return [
                    'My page'          => 'Mijn Ghezibde',
                    'webtrees Message' => 'Ghezibde bericht',
                    'Edit'             => 'Veranderen',
                ];
        }

        return [];
    }
};
