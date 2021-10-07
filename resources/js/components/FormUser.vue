<template>
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="title-form-container">
        <h1 class="title-form">Modifica i tuoi dati</h1>
        <div class="image-user">
          <img src="" alt="">
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
      </form>
    </div>
  </div>
</template>


<script>
export default {
  name: "FormUser",

  data() {
    return {
      nameUser: "",
      emailUser: "",
      phoneUser: "",
      descriptionUser: "",
    };
  },
};
</script>