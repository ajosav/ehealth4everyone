export default class Gate {
    constructor(user) {
        this.user = user;
    }
    doctor() {
        return this.user.role === "doctor";
    }
    patient() {
        return this.user.role === "patient";
    }
}