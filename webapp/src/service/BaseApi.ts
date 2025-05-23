import axios, { AxiosError, AxiosInstance, AxiosResponse } from 'axios';

import router from '@/router';
import routesNames from '@/router/routesNames';
import HttpStatusCodes from '@/service/common/HttpStatusCodes';
import { transformErrors } from '@/service/common/Utils';
import HandlerModule from '@/store/modules/HandlerModule';

const OnResponseSuccess = (response: AxiosResponse): AxiosResponse => response;

const OnResponseFailure = (error: AxiosError<any>): Promise<never> => {
    const httpStatus = error?.response?.status;

    const errors: any = transformErrors(error?.response?.data?.errors);

    if (!error.response) {
        return Promise.reject(errors);
    }

    switch (httpStatus) {
        case HttpStatusCodes.NOT_FOUND:
            errors['message'] = error.response.data.message;
            break;
        case HttpStatusCodes.FORBIDDEN:
            errors['message'] = error.response.data.message;
            break;
        case HttpStatusCodes.UNPROCESSABLE_ENTITY:
            HandlerModule.emitHandler(error.response.data.errors);
            break;
        case HttpStatusCodes.UNAUTHORIZED || HttpStatusCodes.TOKEN_MISMATCH:
            router.push({ name: routesNames.authIndex }).then(() => {});
            break;
        case HttpStatusCodes.SERVER_ERROR:
            errors['message'] = error.response.data.message;
            break;
        default:
            HandlerModule.emitHandler(error.response.data.errors);
            break;
    }

    return Promise.reject(errors);
};

const instance: Readonly<AxiosInstance> = axios.create({
    baseURL: process.env.APP_URL,
    timeout: 7000,
});

instance.defaults.headers.get.Accepts = 'application/json';
instance.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
instance.interceptors.response.use(OnResponseSuccess, OnResponseFailure);

export default instance;
