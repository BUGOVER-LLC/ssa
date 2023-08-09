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
        'no-unused-vars': [2, { vars: 'all', args: 'none' }],
        // 'simple-import-sort/imports': 'error',
        // 'simple-import-sort/exports': 'error',
        // 'unused-imports/no-unused-imports': 'error',
        'unused-imports/no-unused-vars': [
            'warn',
            {
                vars: 'all',
                varsIgnorePattern: '^_',
                args: 'after-used',
                argsIgnorePattern: '^_',
            },
        ],
        'sort-imports': [
            'error',
            {
                ignoreDeclarationSort: true,
            },
        ],
        'constructor-super': 2,
    },
};
