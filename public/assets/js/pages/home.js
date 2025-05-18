import { CurrenciesManager } from '../components/CurrenciesManager/CurrenciesManager.js';
import { CurrenciesManagerDisplayTypesEnum } from '../components/CurrenciesManager/CurrenciesManagerDisplayTypesEnum.js';

const currenciesManager = new CurrenciesManager({ url: 'api/currencies/list', displayType: CurrenciesManagerDisplayTypesEnum.COLUMNS });

await currenciesManager.initialization();

document.querySelector('.main').append(currenciesManager.getDomElement());
