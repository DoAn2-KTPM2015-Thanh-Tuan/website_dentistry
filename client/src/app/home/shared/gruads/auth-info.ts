export class AuthInfo{
    constructor(
        public $uid:string,
        public $name_user:string,
        public $image_user:string,
        public $type_account: Number
    ) {}

    IsLogin() {
        return !!this.$uid;
    }

}