/** @format */

module.exports = {
    extends: [
        'eslint:recommended',
        'plugin:vue/essential',
        'plugin:vue/recommended',
        'plugin:vue/strongly-recommended',
        '@vue/prettier',
        'prettier',
    ],
    env: {
        browser: true,
        node: true,
        es6: true,
        es2022: true,
    },
    parserOptions: {
        ecmaVersion: 'latest',
    },
    plugins: ['unused-imports', 'simple-import-sort', 'jsdoc'],
    overrides: [
        {
            files: ['*.js', '*.jsx', '*.ts', '*.tsx'],
        },
    ],
    rules: {
        'vue/multi-word-component-names': 'off',
        'prettier/prettier': ['error', { singleQuote: true }],
    },
};
