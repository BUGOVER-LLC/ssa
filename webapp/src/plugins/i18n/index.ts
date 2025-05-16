import { createI18n, I18n, LocaleMessages } from 'vue-i18n';

function loadLocaleMessages(): LocaleMessages<never> {
    const locales = require.context('./locales', true, /[A-Za-z0-9-_,\s]+\.json$/i);
    const messages: any = [];
    locales.keys().forEach(key => {
        const matched = key.match(/([A-Za-z0-9-_]+)\./i);
        if (matched && 1 < matched.length) {
            const locale: string = matched[1];
            messages[locale] = locales(key);
        }
    });
    return messages;
}

const i18n: I18n<LocaleMessages<object>> = createI18n({
    locale: process.env.MIX_APP_LOCAL ?? 'en',
    fallbackLocale: process.env.MIX_APP_FALLBACK_LOCAL ?? 'en',
    messages: loadLocaleMessages(),
    silentTranslationWarn: 'production' === process.env.NODE_ENV,
    silentFallbackWarn: 'production' === process.env.NODE_ENV,
});

export default i18n;
