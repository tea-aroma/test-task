import { createHtmlElement } from '../../standards/functions/createHtmlElement.js';


/**
 * Provides the logic for line inputs.
 */
export class SettingsFormLine
{
    /**
     * @public
     *
     * @type { Map<string, Input> }
     */
    inputs = new Map();

    /**
     * @public
     *
     * @type { HTMLDivElement }
     */
    domElement;

    /**
     * @public
     *
     * @type { number }
     */
    id;

    /**
     * @public
     *
     * @type { string }
     */
    domElementClassName;

    /**
     * @constructor
     *
     * @param { number } id
     *
     * @param { string } className
     */
    constructor(id, className)
    {
        this.id = id;

        this.domElementClassName = className;

        this.domElement = this._createDomElement();
    }

    /**
     * Creates a new dom element.
     *
     * @protected
     *
     * @return { HTMLDivElement }
     */
    _createDomElement()
    {
        return createHtmlElement('div', { class: this.domElementClassName, 'data-id': this.id });
    }

    /**
     * Appends the specified input to the existing map.
     *
     * @public
     *
     * @param { string } key
     *
     * @param { Input } input
     *
     * @return { void }
     */
    append(key, input)
    {
        this.domElement.append(input.getDomElement());

        this.inputs.set(key, input);
    }

    /**
     * Gets the input by the specified key.
     *
     * @public
     *
     * @return { Input }
     */
    getInput(key)
    {
        return this.inputs.get(key);
    }

    /**
     * Gets all inputs.
     *
     * @public
     *
     * @return { Map<string, Input> }
     */
    getAll()
    {
        return this.inputs;
    }

    /**
     * Gets the dom element.
     *
     * @public
     *
     * @return { HTMLDivElement }
     */
    getDomElement()
    {
        return this.domElement;
    }

    /**
     * Converts inputs to FormData.
     *
     * @public
     *
     * @return { FormData }
     */
    toFormData()
    {
        const formData = new FormData();

        this.getAll().forEach((input, key) =>
        {
            formData.append(key, input.getValue());
        });

        return formData;
    }

    /**
     * Converts inputs to JSON.
     *
     * @public
     *
     * @return { string }
     */
    toJson()
    {
        const object = {};

        this.getAll().forEach((input, key) =>
        {
            object[ key ] = input.getValue();
        });

        return JSON.stringify(object);
    }
}
