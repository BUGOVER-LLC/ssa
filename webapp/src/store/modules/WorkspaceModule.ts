import { getModule, Module, VuexModule } from 'vuex-module-decorators';

import store from '@/store/index';
import modulesNames from '@/store/moduleNames';

@Module({ dynamic: true, namespaced: true, store, name: modulesNames.workspaceModule })
class WorkspaceModule extends VuexModule {}

export default getModule(WorkspaceModule);
