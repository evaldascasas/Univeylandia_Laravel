const InputForm = {
  template:`
    <div class="input-form">
      <form @submit="submitForm">
        <div class="form-group">
          <label>Nom</label>
          <input v-model="fields.name" type="text" placeholder="Introdueix el teu nom" class="form-control">
          <span style="color: red;">{{ fieldErrors.name }}</span>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input v-model="fields.email" type="email" placeholder="Introdueix el teu email" class="form-control">
          <span style="color: red;">{{ fieldErrors.email }}</span>
        </div>
        <div class="form-group">
          <label>Urgència</label>
          <select v-model="fields.urgency" class="" class="form-control">
            <option disabled value="">Selecciona una opció</option>
            <option>Lleu</option>
            <option>Moderada</option>
            <option>Urgent</option>
          </select>
          <span style="color: red;">{{ fieldErrors.urgency }}</span>
        </div>
        <div class="form-group">
          <label>Missatge / Dubte</label>
          <textarea v-model="fields.message" type="text" class="form-control" rows="3"></textarea>
          <span style="color: red;">{{ fieldErrors.message }}</span>
        </div>
        <div class="form-group">
          <div>
            <input v-model="fields.termsAndConditions" type="checkbox" />
            <label>Accepto els termes i les condicions</label>
            <span style="color: red;">{{ fieldErrors.termsAndConditions }}</span>
          </div>
        </div>

        <button class="btn btn-primary">Enviar</button>
      </form>
    </div>
  `,
  methods: {
    submitForm(evt) {
      evt.preventDefault();
      
      this.fieldErrors = this.validateForm(this.fields);
      if (Object.keys(this.fieldErrors).length) return;

      this.items.push(this.fields.name);

      this.fields.name = '';
      this.fields.email = '';
      this.fields.urgency = '';
      this.fields.message = '';
      this.fields.termsAndConditions = false;
    },
    validateForm(fields) {
      const errors = {};
      if (!fields.name) errors.name = "Nom requerit";
      if (!fields.email) errors.email = "Email requerit";
      if (!fields.urgency) errors.urgency = "Urgència requerit";
      if (!fields.message) errors.message = "Missatge requerit";
      if (!fields.termsAndConditions) errors.termsAndConditions = "Termes i condicions requerits";

      if(fields.email && !this.isEmail(fields.email)) {
        errors.email = "Email no vàlid";
      }

      return errors;
    },
    isEmail(email) {
      const re = /\S+@\S+\.\S/;

      return re.test(email);
    }
  },
  data() {
    return {
      fields: {
        name: '',
        email: '',
        urgency: '',
        message: '',
        termsAndConditions: false,
      },
      fieldErrors: {
        name: undefined,
        email: undefined,
        urgency: undefined,
        message: undefined,
        termsAndConditions: undefined,
      },
      items: []
    }
  }

}

new Vue({
  el: '#app',
  components: {
    'input-form': InputForm
  }
})
