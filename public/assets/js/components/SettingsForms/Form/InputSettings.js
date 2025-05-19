/**
 * Contains all possible settings for the Input component.
 */
export class InputSettings
{
    /**
     * @typedef { Object } InputSettingInterface
     *
     * @property { HTMLFormElement? } domElement
     *
     * @property { string? } domElementClassName
     *
     * @property { string? } id
     *
     * @property { string? } name
     *
     * @property { InputTypesEnum? } type
     *
     * @property { string? } placeholder
     *
     * @property { boolean? } hidden
     *
     * @property { boolean? } disabled
     *
     * @property { ('on' | 'off')? } autocomplete
     *
     * @property { string? } value
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
    domElementClassName = 'input';

    /**
     * @public
     *
     * @type { string }
     */
    id;

    /**
     * @public
     *
     * @type { string }
     */
    name;

    /**
     * @public
     *
     * @type { InputTypesEnum }
     */
    type;

    /**
     * @public
     *
     * @type { string }
     */
    placeholder;

    /**
     * @public
     *
     * @type { boolean }
     */
    hidden = false;

    /**
     * @public
     *
     * @type { boolean }
     */
    disabled = false;

    /**
     * @public
     *
     * @type { 'on' | 'off' }
     */
    autocomplete = 'off';

    /**
     * @public
     *
     * @type { string }
     */
    value;

    /**
     * @constructor
     *
     * @param { InputSettingInterface } settings
     */
    constructor(settings)
    {
        Object.assign(this, settings);
    }
}
