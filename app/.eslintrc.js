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
        es2024: true,
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
        'no-unused-expressions': 'off',
        'accessor-pairs': 2,
        camelcase: [2, { properties: 'never' }],
        eqeqeq: [2, 'allow-null'],
        'handle-callback-err': [2, '^(err|error)$'],
        'new-cap': [2, { newIsCap: true, capIsNew: false }],
        'new-parens': 2,
        'vue/multi-word-component-names': 'off',
        'prettier/prettier': ['error', { singleQuote: true }],
        'no-unused-vars': [2, { vars: 'all', args: 'none' }],
        'simple-import-sort/imports': 'error',
        'simple-import-sort/exports': 'error',
        'unused-imports/no-unused-imports': 'error',
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
                ignoreCase: true,
                allowSeparatedGroups: false,
                ignoreMemberSort: false,
            },
        ],
        yoda: [2, 'always'],
        'constructor-super': 2,
        'vue/no-unused-vars': 'error',
        'vue/no-unused-components': [
            'error',
            {
                ignoreWhenBindingPresent: true,
            },
        ],
    },
};
