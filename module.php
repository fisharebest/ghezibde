<?php

/**
 * Example module.
 */

declare(strict_types=1);

namespace Ghezibde;

use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\View;

return new class extends AbstractModule implements ModuleCustomInterface {
    use ModuleCustomTrait;

    public function title(): string
    {
        return 'Ghezibde';
    }

    public function description(): string
    {
        return 'Modifications for Ghezibde';
    }

    public function customModuleAuthorName(): string
    {
        return 'Greg Roach';
    }

    public function boot(): void
    {
        View::registerNamespace(namespace: 'ghezibde', path: $this->resourcesFolder() . 'views/');

        // Change the filed "input type=url" to restrict to paths containing "/ark:/".
        View::registerCustomView(old: '::modals/media-file-fields', new: 'ghezibde::modals/media-file-fields');
    }

    public function resourcesFolder(): string
    {
        return __DIR__ . '/resources/';
    }

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
