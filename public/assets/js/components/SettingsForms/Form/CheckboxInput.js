import { Input } from './Input.js';
import { createHtmlElement } from '../../../standards/functions/createHtmlElement.js';

/**
 * @inheritDoc
 */
export class CheckboxInput extends Input
{
    /**
     * @inheritDoc
     *
     * @protected
     *
     * @return { HTMLInputElement }
     */
    _createDomElement()
    {
        const input = createHtmlElement('input', this._getAttributes());

        input.checked = Boolean(this._settings.value);

        input.className = 'checkbox';

        return createHtmlElement('label', { class: this._settings.domElementClassName }, [ input, this._settings.placeholder ]);
    }

    /**
     * @inheritDoc
     *
     * @return { boolean }
     */
    getValue()
    {
        return this._domElement.querySelector('input').checked;
    }
}
