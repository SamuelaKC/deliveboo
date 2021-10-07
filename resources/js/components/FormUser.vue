<template>
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="title-form-container">
        <h1 class="title-form">Modifica i tuoi dati</h1>
        <div class="image-user">
          <img :src="user.picture" alt="">
        </div>
      </div>
      <form class="form-user form-group">

        <label for="name-user">Nome del tuo Servizio</label>
        <input
          type="text"
          class="form-control"
          id="name-user"
          v-model="nameUser"
        />

        <label for="email-user">la tua Email</label>
        <input
          type="email"
          class="form-control"
          id="email-user"
          v-model="emailUser"
        />

        <label for="address-user">il tuo Indirizzo</label>
        <input
          type="text"
          class="form-control"
          id="address-user"
          v-model="addressUser"
        />

        <label for="phone-user">il tuo Contatto</label>
        <input
          type="tel"
          class="form-control"
          id="phone-user"
          v-model="phoneUser"
        />

        <label for="description-user">una breve Descrizione</label>
        <textarea
          id="decription-user"
          class="form-control"
          v-model="descriptionUser"
        ></textarea>

        <label for="piva-user">P.Iva</label>
        <input
          type="text"
          class="form-control"
          id="piva-user"
          v-model="pivaUser"
        />

        <button @click="saveEdit()">Salva</button>
      </form>
    </div>
  </div>
</template>


<script>
export default {
  name: "FormUser",

  created() {
    this.getUser();
  },

  data() {
    return {
      nameUser: "",
      emailUser: "",
      phoneUser: "",
      descriptionUser: "",
      addressUser: "",
      pivaUser: "",
      user: [],
    };
  },

  computed: {
    editUser() {
      return {
        name: this.nameUser,
        email: this.emailUser,
        address: this.addressUser,
        phone_number: this.phoneUser,
        piva: this.pivaUser,
        description: this.descriptionUser
      }
    }
  },

  methods: {
    getUser() {

        axios.get("/api/users/10").then((response) => {
        this.user = response.data;

        this.nameUser = this.user.name;
        this.emailUser = this.user.email;
        this.phoneUser = this.user.phone_number;
        this.descriptionUser = this.user.description;
        this.addressUser = this.user.address;
        this.pivaUser = this.user.piva;
      });
    },

    saveEdit() {

      axios.put('/api/users/10', this.editUser).then((response) => {
        console.log(response);
      });
    }
  }
};
</script>