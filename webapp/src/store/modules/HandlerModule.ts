import { Action, getModule, Module, Mutation, VuexModule } from 'vuex-module-decorators';

import store from '@/store';
import { HandlerModel } from '@/store/models/HandlerModel';
import modulesNames from '@/store/moduleNames';

@Module({ dynamic: true, namespaced: true, store, name: modulesNames.handlerModule })
class HandlerModule extends VuexModule {
    private _handlerCache: Record<string, HandlerModel> = {};
    private _menuMiniVariant = false;

    @Mutation
    private fetchHandler(payload: HandlerModel) {
        for (const [key, value] of Object.entries(payload)) {
            this._handlerCache[key] = value;
        }
    }

    @Mutation
    public fetchMenuMini(val: boolean) {
        this._menuMiniVariant = val;
    }

    @Action({ rawError: true })
    public emitHandler(payload: HandlerModel) {
        return this.fetchHandler(payload);
    }

    @Action({ rawError: true })
    public emitMenuMini() {
        const mini = !this._menuMiniVariant;
        return this.fetchMenuMini(mini);
    }

    public get handler() {
        return this._handlerCache;
    }

    public get menuMiniVariant() {
        return this._menuMiniVariant;
    }
}

export default getModule(HandlerModule);
