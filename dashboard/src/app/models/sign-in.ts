export class SignIn {
    username?: string;
    password?: string;

    constructor(userName ?: string, password ?: string) {
        this.username = userName;
        this.password = password;
    }
}
