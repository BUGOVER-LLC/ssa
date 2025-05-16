import Vuex from 'vuex';
import VuexPersistence from 'vuex-persist';

import { HandlerModel } from '@/store/models/HandlerModel';
import { UserModel } from '@/store/models/UserModel';
import { WorkspaceModel } from '@/store/models/WorkspaceModel';

interface ModulesState {
    user: UserModel;
    handler: HandlerModel;
    workspace: WorkspaceModel;
}

const vuexLocal: VuexPersistence<object> = new VuexPersistence({
    storage: window.localStorage,
    strictMode: 'production' !== process.env.NODE_ENV,
    key: 'producerStore',
});

export default new Vuex.Store<ModulesState>({
    strict: 'production' !== process.env.NODE_ENV,
    devtools: 'production' !== process.env.NODE_ENV,
    plugins: [vuexLocal.plugin],
    mutations: {
        RESTORE_MUTATION: vuexLocal.RESTORE_MUTATION,
    },
});
