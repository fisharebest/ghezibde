<?php

/**
 * Example module.
 */

declare(strict_types=1);

namespace Ghezibde;

use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\Registry;
use Fisharebest\Webtrees\View;

require __DIR__ . '/GhezibdeSurnameTradition.php';

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

        Registry::surnameTraditionFactory()->register(
            name: 'patrilineal-ghezibde',
            surname_tradition: new GhezibdeSurnameTradition()
        );
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
                    'My ancestors'     => 'My ancestors',
                    'My fan tree'     => 'My fan tree',
                    'webtrees Message' => 'Ghezibde message',
                    'No children'      => 'No recorded children',
                    'You sent the following message to a webtrees user:' => 'You sent the following message to a Ghezibde user:',
                    'FAQ'              => 'Help',
                    'Use this field to tell the site administrator why you are requesting an account and how you are related to the genealogy displayed on this site. You can also use this to enter any other comments you may have for the site administrator.'                                        => '<b><u>ATTENTION:</u></b> Explain here which individual or family in the existing branches you are related to and describe your relationship to this individual or family. If more than one relationship, give us the shortest / closest relationship. <b>Without these explanations, your request will not be considered!</b>'
                ];

            case 'fr':
                return [
                    'My page'                                            => 'Mon Ghezibde',
                    'My ancestors'                                       => 'Mes ancêtres',
                    'My fan tree'                                        => 'Mon éventail',
                    'webtrees message'                                   => 'Message Ghezibde',
                    'No children'                                        => 'Aucun enfant encore recensé',
                    'You sent the following message to a webtrees user:' => 'Vous avez envoyé le message suivant à l’utilisateur Ghezibde:',
                    'The username or password is incorrect.'             => 'Identifiant ou mot de passe incorrect',
                    'Family trees'                                       => 'Arbres',
                    'FAQ'                                                => 'Aide',
                    'Sign in'                                           => 'Se connecter / S’inscrire',
                    'Use this field to tell the site administrator why you are requesting an account and how you are related to the genealogy displayed on this site. You can also use this to enter any other comments you may have for the site administrator.'                                        => '<b><u>ATTENTION :</u></b> Expliquez ici à <b>quel individu ou à quelle famille</b> présentes dans les branches existantes vous êtes en lien et quel est votre parenté avec cet individu ou cette famille. Si plusieurs liens, nous donner <b>le lien plus court / le plus récent. Sans ces explications, votre demande ne sera pas examinée !</b>'
                ];

            case 'nl':
                return [
                    'My page'          => 'Mijn Ghezibde',
                    'My ancestors'     => 'Mijn voorouders',
                    'My fan tree'      => 'Mijn waaier boom',
                    'webtrees Message' => 'Ghezibde bericht',
                    'Edit'             => 'Veranderen',
                    'FAQ'              => 'Hulp',
                    'Use this field to tell the site administrator why you are requesting an account and how you are related to the genealogy displayed on this site. You can also use this to enter any other comments you may have for the site administrator.'                                        => '<b><u>LET OP:</u></b> Leg hier uit aan welke persoon of familie in de bestaande takken u verwant bent en beschrijf uw relatie tot deze persoon of familie. Indien meer dan één relatie, geef dan de kortste/naaste relatie. <b>Zonder deze toelichting wordt uw verzoek niet in behandeling genomen!</b>.'
                ];
        }

        return [];
    }
};
