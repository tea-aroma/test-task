/**
 * Returns the yesterday date by the specified date.
 *
 * @param { Date | string } date
 *
 * @returns { Date }
 */
export function yesterdayDate(date)
{
    date = new Date(date.toString());

    date.setDate(date.getDate() - 1);

    return date;
}
