<template>
  <div class="flex justify-center items-center">
    <ValidationObserver
      class="w-full lg:w-1/2"
      ref="registerForm"
      tag="form"
      @submit.stop.prevent="store()"
    >
      <h3 class="text-xl text-center p-5 text-gray-500 ml-2">
        Editar Produto
      </h3>

      <div
        v-if="response.message"
        :class="`rounded-sm bg-${response.color}-100 p-4 mb-4`"
      >
        <h3 :class="`text-sm leading-5 font-medium text-${response.color}-800`">
          {{ response.message }}
        </h3>
      </div>

      <div class="grid gap-2">
        <div class="flex">
          <div class="w-1/2 mr-2">
            <ValidationProvider
              v-slot="{ errors }"
              rules="required"
              name="Nome"
            >
              <input
                v-model="form.name"
                type="text"
                placeholder="Digite o Nome"
                class="bg-gray-900 placeholder-gray-700 text-gray-500 font-light border border-gray-900 focus:outline-none focus:border-blue-800 rounded-sm py-3 px-4 block w-full appearance-none leading-normal"
              />

              <div v-if="!!errors[0]" class="text-red-500 text-sm mb-2">
                {{ errors[0] }}
              </div>
            </ValidationProvider>
          </div>

          <div class="w-1/2  ml-2">
            <ValidationProvider
              v-slot="{ errors }"
              rules="required"
              name="Preço"
            >
              <input
                v-model="form.price"
                type="number"
                step="0.01"
                placeholder="Digite o Preço"
                class="bg-gray-900 placeholder-gray-700 text-gray-500 font-light border border-gray-900 focus:outline-none focus:border-blue-800 rounded-sm py-3 px-4 block w-full appearance-none leading-normal"
              />

              <div v-if="!!errors[0]" class="text-red-500 text-sm mb-2">
                {{ errors[0] }}
              </div>
            </ValidationProvider>
          </div>
        </div>

        <ValidationProvider v-slot="{ errors }" rules="required" name="Estoque">
          <input
            v-model="form.stock"
            type="number"
            placeholder="Quantidade em estoque"
            class="bg-gray-900 placeholder-gray-700 text-gray-500 font-light border border-gray-900 focus:outline-none focus:border-blue-800 rounded-sm py-3 px-4 block w-full appearance-none leading-normal"
          />

          <div v-if="!!errors[0]" class="text-red-500 text-sm mb-2">
            {{ errors[0] }}
          </div>
        </ValidationProvider>

        <input
          autocomplete
          v-model="form.weight"
          type="number"
          step="0.01"
          placeholder="Peso do Produto"
          class="bg-gray-900 placeholder-gray-700 text-gray-500 font-light border border-gray-900 focus:outline-none focus:border-blue-800 rounded-sm py-3 px-4 block w-full appearance-none leading-normal"
        />

        <button
          type="submit"
          :disabled="spinner.register"
          class="items-center justify-center bg-blue-800 text-blue-200 font-medium text-sm focus:outline-none rounded-sm py-3 px-4 block w-full appearance-none leading-normal"
        >
          <img
            v-if="spinner.register"
            src="@/assets/img/spinner.svg"
            alt=""
            class="w-5 h-5 mr-2"
          />

          Salvar
        </button>
      </div>
    </ValidationObserver>
  </div>
</template>

<script>
import { ValidationObserver, ValidationProvider } from "vee-validate";
// import messages from "@/utils/messages";

export default {
  name: "ProductForm",
  components: {
    ValidationObserver,
    ValidationProvider,
  },

  data() {
    return {
      form: {
        name: "",
        price: "",
        stock: "",
        weight: "",
      },

      response: {
        color: "",
        message: "",
      },
      spinner: {
        register: false,
      },
    };
  },
  async created(){
    this.findProduct()
  },
  methods: {
    async findProduct(){
     const { data:response } = await this.$axios.get(`products/${this.$route.params.id}`)
     this.form = response.data
    },
    async store() {
      const validator = await this.$refs.registerForm.validate();
      if (!validator) {
        return;
      }

      this.resetResponse();

      this.spinner.register = true;

      this.$axios
        .put(`products/${this.$route.params.id}`, this.form)
        .then(() => {
          this.response.color = "green";
          this.response.message = "Seu cadastro foi feito com sucesso.";

          this.resetForm();
          this.$router.push({name: 'index'});
        })
        .catch((error) => {
          let errorMessage = error?.response?.data?.errors?.name[0] || "Ops, Alguma coisa deu errado";
          // if(errorMessage == null) errorMessage = error?.response?.data?.errors?.price[0] || null;
          // if(errorMessage == null) errorMessage = error?.response?.data?.errors?.weight[0] || null;
          // if(errorMessage == null) errorMessage = "Ops, Alguma coisa deu errado";

          this.response.color = "red";
          this.response.message = errorMessage
        })
        .finally(() => {
          this.spinner.register = false;
        });
    },

    resetResponse() {
      this.response.color = "";
      this.response.message = "";
    },

    resetForm() {
      this.$refs.registerForm.reset();
      this.form.name = "";
      this.form.price = "";
      this.form.stock = "";
      this.form.weight = "";
    },
  },
};
</script>
