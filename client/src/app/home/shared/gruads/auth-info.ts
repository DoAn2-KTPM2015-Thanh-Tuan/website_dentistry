export class AuthInfo{
    
    constructor(
        public $uid:string,
        public $type_account: Number
    ) {}

    IsLogin() {
        return !!this.$uid;
    }

}