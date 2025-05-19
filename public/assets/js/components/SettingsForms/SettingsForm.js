import { SettingsFormSettings } from './SettingsFormSettings.js';
import { createHtmlElement } from '../../standards/functions/createHtmlElement.js';
import { CustomEvents } from '../../standards/Events/CustomEvents.js';
import { InputTypesEnum } from './Form/InputTypesEnum.js';
import { TextInput } from './Form/TextInput.js';
import { HttpRequest } from '../../standards/HttpRequest.js';
import { SettingsFormLine } from './SettingsFormLine.js';
import { setCssVariable } from '../../standards/functions/setCssVariable.js';
import { CheckboxInput } from './Form/CheckboxInput.js';


/**
 * Provides the logic for working with the settings form.
 */
export class SettingsForm
{
    /**
     * @public
     *
     * @type { CustomEvents }
     */
    customEvents = new CustomEvents();

    /**
     * @protected
     *
     * @type { HTMLFormElement }
     */
    _domElement;

    /**
     * @protected
     *
     * @type { SettingsFormSettings }
     */
    _settings;

    /**
     * @public
     *
     * @type { Map<number, SettingsFormLine> }
     */
    lines = new Map();

    /**
     * @public
     *
     * @type { number }
     */
    timeoutId = 0;

    /**
     * @constructor
     *
     * @param { SettingsFormSettingInterface } settings
     */
    constructor(settings)
    {
        this._settings = settings instanceof SettingsFormSettings ? settings : new SettingsFormSettings(settings);
    }

    /**
     * Initializes the base logic.
     *
     * @public
     *
     * @return { Promise<void> }
     */
    async initialization()
    {
        this._domProcessing();

        await this.build();

        this._domElement.addEventListener('change', this._handler.bind(this));

        this._domElement.addEventListener('keyup', this._handler.bind(this));
    }

    /**
     * Handles the process for the events.
     *
     * @protected
     *
     * @param { InputEvent } event
     *
     * @return { void }
     */
    _handler(event)
    {
        clearTimeout(this.timeoutId);

        this.timeoutId = setTimeout(() =>
        {
            const target = event.target;

            const line = target.closest('.' + this._settings.domLineElementClassName);

            this.update(line);

        }, 300);
    }

    /**
     * Updates a record by the specified line.
     *
     * @public
     *
     * @param { HTMLDivElement } line
     *
     * @return { Promise<void> }
     */
    async update(line)
    {
        const dataId = line.getAttribute('data-id');

        const json = this.getLineById(dataId).toJson();

        await HttpRequest.send({ url: this._settings.updateUrl, data: json, method: 'post' });
    }

    /**
     * Gets a line by specified id.
     *
     * @public
     *
     * @param { string | number } id
     *
     * @return { SettingsFormLine }
     */
    getLineById(id)
    {
        return this.lines.get(parseInt(id));
    }

    /**
     * Handles the process of the dom.
     *
     * @public
     *
     * @return { void }
     */
    _domProcessing()
    {
        this._domElement = this._settings.domElement || this._createDomElement();
    }

    /**
     * Creates a new dom element.
     *
     * @protected
     *
     * @return { HTMLFormElement }
     */
    _createDomElement()
    {
        return createHtmlElement('form', { class: this._settings.domElementClassName }, []);
    }

    /**
     * Builds the lines and inputs.
     *
     * @public
     *
     * @return { void }
     */
    async build()
    {
        const settings = await this.getSettings();

        setCssVariable('settings-form-count', this._settings.inputs.length.toString());

        for (let i = 0, n = settings.data.length; i < n; i++)
        {
            const setting = settings.data[ i ];

            const line = new SettingsFormLine(setting.id, this._settings.domLineElementClassName);

            for (const key in setting)
            {
                const value = setting[ key ];

                const inputSetting = this.getInputSettingsByName(key);

                if (!inputSetting)
                {
                    continue;
                }

                inputSetting.value = value;

                const inputInstance = this.getInputInstanceByType(inputSetting.type, inputSetting);

                inputInstance.initialization();

                line.append(key, inputInstance);

                this.lines.set(setting.id, line);
            }

            this._domElement.append(line.getDomElement());
        }
    }

    /**
     * Gets an input by the specified name.
     *
     * @public
     *
     * @return { InputSettingInterface }
     */
    getInputSettingsByName(name)
    {
        return this._settings.inputs.find((input) => input.name === name);
    }

    /**
     * Sends request and gets records.
     *
     * @public
     *
     * @return { Promise<HttpResponse> }
     */
    async getSettings()
    {
        const request = await HttpRequest.send({ url: this._settings.url, method: 'get' });

        return request.getResponse();
    }

    /**
     * Creates and returns an instance of the Input component by the specified type.
     *
     * @public
     *
     * @param { InputTypesEnum } type
     *
     * @param { InputSettingInterface } settings
     *
     * @return { Input }
     */
    getInputInstanceByType(type, settings)
    {
        switch (type)
        {
            case InputTypesEnum.CHECKBOX: return new CheckboxInput(settings);
            case InputTypesEnum.TEXT: return new TextInput(settings);
        }
    }

    /**
     * Gets the dom element.
     *
     * @public
     *
     * @return { HTMLFormElement }
     */
    getDomElement()
    {
        return this._domElement;
    }
}
