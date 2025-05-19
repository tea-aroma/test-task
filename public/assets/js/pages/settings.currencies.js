import { SettingsForm } from '../components/SettingsForms/SettingsForm.js';
import { InputTypesEnum } from '../components/SettingsForms/Form/InputTypesEnum.js';


/**
 * @var { SettingsFormSettingInterface }
 */
const settings =
    {
        url: 'api/settings/currencies/list',
        updateUrl: 'api/settings/currencies/update',
        inputs:
            [
                { type: InputTypesEnum.TEXT, name: 'id', placeholder: 'Key', disabled: true, domElementClassName: 'input input--type-id' },
                { type: InputTypesEnum.TEXT, name: 'currency_char_code', placeholder: '', disabled: true },
                { type: InputTypesEnum.TEXT, name: 'currency_name', placeholder: '', disabled: true },
                { type: InputTypesEnum.CHECKBOX, name: 'is_load', placeholder: 'Is load', domElementClassName: 'input input--type-checkbox' },
                { type: InputTypesEnum.CHECKBOX, name: 'is_show', placeholder: 'Is show', domElementClassName: 'input input--type-checkbox' },
                { type: InputTypesEnum.TEXT, name: 'description', placeholder: 'Description' },
            ],
    }

const settingsForm = new SettingsForm(settings);

settingsForm.initialization();

document.querySelector('.main').append(settingsForm.getDomElement());

console.log(settingsForm);
