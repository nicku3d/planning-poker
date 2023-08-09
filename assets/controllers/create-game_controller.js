import { Controller } from '@hotwired/stimulus';


export default class extends Controller {
    static targets = ["form"];

    connect() {
        this.formTarget.addEventListener("submit", this.handleSubmit);
    }

    disconnect() {
        this.formTarget.removeEventListener("submit", this.handleSubmit);
    }

    handleSubmit = async (event) => {
        event.preventDefault();
        try {
            const formData = new FormData(this.formTarget);
            const response = await fetch(this.formTarget.action, {
                method: "POST",
                body: formData,
            });

            if (response.status === 201) {
                const responseData = await response.json();
                const key = responseData.key;
                //TODO the redirect can be made directly in the symfony controller, but do i want that? I don't think so
                window.location.href = `/games/${key}`; // Redirect to the game link
            } else {
                //TODO create error message
                console.log('error');
                console.log(response);
            }
        } catch (error) {
            //TODO create error message
            console.log(error);
        }
    }
}