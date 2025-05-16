import BaseApi from '@/service/BaseApi';

const USERS = '/umra/attributes';

export const GetUsers = async (): Promise<any> => {
    const res = await BaseApi.get(USERS);

    return res?.data;
};
