import BaseApi from '@/service/BaseApi';

const WORKSPACE = '/umra/attributes';

export const WorkspaceApi = async (): Promise<any> => {
    const res = await BaseApi.get(WORKSPACE);

    return res?.data;
};
