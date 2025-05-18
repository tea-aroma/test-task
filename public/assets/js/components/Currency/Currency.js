import { createHtmlElement } from '../../standards/functions/createHtmlElement.js';
import { CurrencySettings } from './CurrencySettings.js';
import { CurrencyData } from './CurrencyData.js';
import { CurrenciesManager } from '../CurrenciesManager/CurrenciesManager.js';
import { convertToURL } from '../../standards/functions/convertToURL.js';


/**
 * Provides the logic for the Currency component.
 */
export class Currency
{
    /**
     * @typedef { { status: string, message: string,  data?: Array<any>, record?: Array | Object } } HttpResponse
     */

    /**
     * @protected
     *
     * @type { CurrencySettings }
     */
    _settings;

    /**
     * @protected
     *
     * @type { HTMLDivElement }
     */
    _domElement;

    /**
     * @protected
     *
     * @type { HTMLDivElement }
     */
    _domHeader;

    /**
     * @protected
     *
     * @type { HTMLParagraphElement }
     */
    _domCharCode;

    /**
     * @protected
     *
     * @type { HTMLParagraphElement }
     */
    _domNumCode;

    /**
     * @protected
     *
     * @type { HTMLDivElement }
     */
    _domValues;

    /**
     * @protected
     *
     * @type { HTMLParagraphElement }
     */
    _domValue;

    /**
     * @protected
     *
     * @type { Text }
     */
    _textValue;

    /**
     * @protected
     *
     * @type { HTMLParagraphElement }
     */
    _domVunitRate;

    /**
     * @protected
     *
     * @type { Text }
     */
    _textVunitRate;

    /**
     * @protected
     *
     * @type { number }
     */
    _value = 0;

    /**
     * @protected
     *
     * @type { number }
     */
    _vunitRate = 0;

    /**
     * @protected
     *
     * @type { URL }
     */
    _url;

    /**
     * @protected
     *
     * @type { CurrencyDataInterface }
     */
    _record;

    /**
     * @public
     *
     * @type { boolean }
     */
    isInitialized = false;

    /**
     * @constructor
     *
     * @param { CurrencySettingInterface? } settings
     */
    constructor(settings)
    {
        this._settings = settings instanceof CurrencySettings ? settings : new CurrencySettings(settings);

        this._url = convertToURL(this._settings.url);
    }

    /**
     * Initializes the base logic.
     *
     * @return { Promise<void> }
     */
    async initialization()
    {
        this._domProcessing();

        this.isInitialized = true;
    }

    /**
     * Handles the process of the dom.
     *
     * @protected
     *
     * @return { void }
     */
    _domProcessing()
    {
        this._domCharCode = this._createDomCharCodeElement();

        this._domNumCode = this._createDomNumCodeElement();

        this._domHeader = this._createDomHeaderElement();

        this._domValue = this._createDomValueElement();

        this._domVunitRate = this._createDomVunitRateElement();

        this._domValues = this._createDomValuesElement();

        this._domElement = this._settings.domElement || this._createDomElement();
    }

    /**
     * Updates the component.
     *
     * @public
     *
     * @param { CurrencyDataInterface? } record
     *
     * @return { Promise<void> }
     */
    async update(record)
    {
        record = this._record = record || this._settings.record || (await Currency.getRecord(this._url, this._settings.data));

        this._domCharCode.textContent = record.currency_char_code;

        this._domNumCode.textContent = record.currency_num_code;

        this.value = record.value;

        this.vunitRate = record.vunit_rate;
    }

    /**
     * Creates a new dom element.
     *
     * @return { HTMLDivElement }
     */
    _createDomElement()
    {
        return createHtmlElement('div', { class: this._settings.domElementClassName }, [ this._domHeader, this._domValues ]);
    }

    /**
     * Creates a new dom header element.
     *
     * @return { HTMLDivElement }
     */
    _createDomHeaderElement()
    {
        return createHtmlElement('div', { class: this._settings.domHeaderClassName }, [ this._domCharCode, this._domNumCode ]);
    }

    /**
     * Creates a new char code element.
     *
     * @return { HTMLParagraphElement }
     */
    _createDomCharCodeElement()
    {
        return createHtmlElement('p', { class: this._settings.domLabelClassName + ' ' + this._settings.domCharCodeClassName });
    }

    /**
     * Creates a new num code element.
     *
     * @return { HTMLParagraphElement }
     */
    _createDomNumCodeElement()
    {
        return createHtmlElement('p', { class: this._settings.domLabelClassName + ' ' + this._settings.domNumCodeClassName });
    }

    /**
     * Creates a new values element.
     *
     * @return { HTMLDivElement }
     */
    _createDomValuesElement()
    {
        return createHtmlElement('div', { class: this._settings.domValuesClassName }, [ this._domValue, this._domVunitRate ]);
    }

    /**
     * Creates a new value element.
     *
     * @return { HTMLParagraphElement }
     */
    _createDomValueElement()
    {
        const icon = this._createDomIcon(this._settings.arrowIconId, this._settings.domIconClassName);

        const equalIcon = this._createDomIcon(this._settings.equalIconId, this._settings.domEqualIconClassName);

        this._textValue = new Text();

        return createHtmlElement('p', { class: this._settings.domLabelClassName + ' ' + this._settings.domValueClassName }, [ icon, equalIcon, this._textValue ]);
    }

    /**
     * Creates a new vunit rate element.
     *
     * @return { HTMLParagraphElement }
     */
    _createDomVunitRateElement()
    {
        const icon = this._createDomIcon(this._settings.arrowIconId, this._settings.domIconClassName);

        const equalIcon = this._createDomIcon(this._settings.equalIconId, this._settings.domEqualIconClassName);

        this._textVunitRate = new Text();

        return createHtmlElement('p', { class: this._settings.domLabelClassName + ' ' + this._settings.domVunitRateClassName }, [ icon, equalIcon, this._textVunitRate ]);
    }

    /**
     * Creates a new svg icon.
     *
     * @public
     *
     * @return { SVGElement }
     */
    _createDomIcon(id, className)
    {
        const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');

        svg.classList.add(className);

        const use = document.createElementNS('http://www.w3.org/2000/svg', 'use');

        use.setAttribute('href', `/assets/icons/sprite.svg#${ id }`);

        svg.append(use);

        return svg;
    }

    /**
     * Gets the value.
     *
     * @public
     *
     * @return { string }
     */
    get value()
    {
        return this._value.toFixed(3);
    }

    /**
     * Sets the specified value.
     *
     * @public
     *
     * @param { string | number } value
     *
     * @return { void }
     */
    set value(value)
    {
        this._value = parseFloat(value);

        this._directionProcessing(this._domValue, 'equal', this._record.value === this._record.yesterday_value);

        this._directionProcessing(this._domValue, 'up', this._record.value > this._record.yesterday_value);

        this._directionProcessing(this._domValue, 'down', this._record.value < this._record.yesterday_value);

        this._textValue.textContent = this.value;
    }

    /**
     * Gets the vunit rate.
     *
     * @public
     *
     * @return { string }
     */
    get vunitRate()
    {
        return this._vunitRate.toFixed(3);
    }

    /**
     * Sets the specified vunit rate.
     *
     * @public
     *
     * @param { string | number } value
     *
     * @return { void }
     */
    set vunitRate(value)
    {
        this._vunitRate = parseFloat(value);

        this._directionProcessing(this._domVunitRate, 'equal', this._record.vunit_rate === this._record.yesterday_vunit_rate);

        this._directionProcessing(this._domVunitRate, 'up', this._record.vunit_rate > this._record.yesterday_vunit_rate);

        this._directionProcessing(this._domVunitRate, 'down', this._record.vunit_rate < this._record.yesterday_vunit_rate);

        this._textVunitRate.textContent = this.vunitRate;
    }

    /**
     * Handles the process for the direction.
     *
     * @protected
     *
     * @param { HTMLElement } element
     *
     * @param { string } className
     *
     * @param { boolean } force
     *
     * @return { void }
     */
    _directionProcessing(element, className, force)
    {
        element.classList.toggle(className, force);
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
        return this._domElement;
    }

    /**
     * Gets the record.
     *
     * @public
     *
     * @param { URL } url
     *
     * @param { Object } options
     *
     * @return { Promise<CurrencyData> }
     */
    static async getRecord(url, options)
    {
        const request = await CurrenciesManager.request(url, options);

        return CurrencyData.fromValues(request.record);
    }
}
