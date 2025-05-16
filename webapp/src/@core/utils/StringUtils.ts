import i18 from '@/plugins/i18n';

export const capitalizeFirstLetter = (str: string): string => str.charAt(0).toUpperCase() + str.slice(1);

export const trans = (value: string, count = 1) => i18.global.rt(value, count);
