interface IModuleNames {
    userModule: string;
    handlerModule: string;
    workspaceModule: string;
}

const moduleNames: Readonly<IModuleNames> = {
    userModule: 'userModule',
    handlerModule: 'handlerModule',
    workspaceModule: 'workspaceModule',
};

export default moduleNames;
