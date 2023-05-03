import API from "./API";

export default{
    getClient(){
        return API().get('/client')
    },
    createClient(data){
        return API().post('/client', data)
    },
    getClientID(id){
        return API().get('/client/'+id)
    },
    filterClient(data){
        return API().post('/filterclient', data)
    },
}