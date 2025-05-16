import { Module as Mod } from 'vuex';
import { ModuleOptions } from 'vuex-module-decorators/dist/types/moduleoptions';

declare module 'vuex-module-decorators' {
    export function Module<S>(options: ModuleOptions): ClassDecorator;
    export function Module<S>(module: Function & Mod<S, any>): void;
}
