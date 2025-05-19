/**
 * Contains all possible settings for SettingsForm component.
 */
export class SettingsFormSettings
{
    /**
     * @typedef { Object } SettingsFormSettingInterface
     *
     * @property { HTMLFormElement? } domElement
     *
     * @property { string? } domElementClassName
     *
     * @property { string? } domLineElementClassName
     *
     * @property { string? } url
     *
     * @property { string? } updateUrl
     *
     * @property { InputSettingInterface[] } inputs
     */

    /**
     * @public
     *
     * @type { HTMLFormElement }
     */
    domElement;

    /**
     * @public
     *
     * @type { string }
     */
    domElementClassName = 'settings-form settings-form--style-default';

    /**
     * @public
     *
     * @type { string }
     */
    domLineElementClassName = 'settings-form__line';

    /**
     * @public
     *
     * @type { string }
     */
    url;

    /**
     * @public
     *
     * @type { string }
     */
    updateUrl;

    /**
     * @public
     *
     * @type { InputSettingInterface[] }
     */
    inputs = [];

    /**
     * @constructor
     *
     * @param { SettingsFormSettingInterface } settings
     */
    constructor(settings)
    {
        Object.assign(this, settings);
    }
}
