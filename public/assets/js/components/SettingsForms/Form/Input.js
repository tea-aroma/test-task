import { CustomEvents } from '../../../standards/Events/CustomEvents.js';
import { InputSettings } from './InputSettings.js';


/**
 * Provides the abstract logic for inputs.
 *
 * @abstract
 */
export class Input
{
    /**
     * @protected
     *
     * @type { CustomEvents }
     */
    customEvents = new CustomEvents();

    /**
     * @protected
     *
     * @type { HTMLInputElement }
     */
    _domElement;

    /**
     * @protected
     *
     * @type { InputSettingInterface }
     */
    _settings;

    /**
     * @constructor
     *
     * @param { InputSettingInterface } settings
     */
    constructor(settings)
    {
        this._settings = settings;
    }

    /**
     * Initializes the base logic.
     *
     * @public
     *
     * @return { void }
     */
    initialization()
    {
        this._settings = this._createSettings(this._settings);

        this._domElement = this._settings.domElement || this._createDomElement();
    }

    /**
     * Creates a new dom element.
     *
     * @abstract
     *
     * @protected
     *
     * @return { HTMLInputElement }
     */
    _createDomElement() {}

    /**
     * Creates a new settings.
     *
     * @protected
     *
     * @param { InputSettingInterface } settings
     *
     * @return { InputSettings }
     */
    _createSettings(settings)
    {
        return settings instanceof InputSettings ? settings : new InputSettings(settings);
    }

    /**
     * Gets the attributes.
     *
     * @protected
     *
     * @return { Object }
     */
    _getAttributes()
    {
        const attributes = { class: this._settings.domElementClassName, type: this._settings.type };

        this._settings.name && (attributes.name = this._settings.name);

        this._settings.id && (attributes.id = this._settings.id);

        this._settings.hidden && (attributes.hidden = this._settings.hidden);

        this._settings.autocomplete && (attributes.autocomplete = this._settings.autocomplete);

        this._settings.placeholder && (attributes.placeholder = this._settings.placeholder);

        this._settings.disabled && (attributes.disabled = this._settings.disabled);

        this._settings.value && (attributes.value = this._settings.value);

        return attributes;
    }

    /**
     * Gets the dom element.
     *
     * @public
     *
     * @return { HTMLInputElement }
     */
    getDomElement()
    {
        return this._domElement;
    }

    /**
     * Gets the value of dom element.
     *
     * @public
     *
     * @return { any }
     */
    getValue()
    {
        return this._domElement.value;
    }
}
