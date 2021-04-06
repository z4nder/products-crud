<template>
  <div class="w-full sm:w-1/2 lg:w-2/3 mx-auto bg-gray">
    <div class="flex items-center justify-between mb-8">
      <div class="text-gray-500 font-medium">
        Lista de tarefas
      </div>
      <RouterLink
        :to="{ name: 'create' }"
        class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-white hover:border-yellow-500 hover:text-black "
      >
        Cadastrar Produto
      </RouterLink>
    </div>
    <DataTable>
      <tr slot="table-title" class="bg-gray-900 border-gray-200">
        <th class="px-16 py-2">
          <span class="text-gray-300">ID</span>
        </th>
        <th class="px-16 py-2">
          <span class="text-gray-300">Nome</span>
        </th>
        <th class="px-16 py-2">
          <span class="text-gray-300">Preço</span>
        </th>
        <th class="px-16 py-2">
          <span class="text-gray-300">Peso</span>
        </th>
        <th class="px-16 py-2">
          <span class="text-gray-300">Estoque</span>
        </th>
        <th class="px-16 py-2">
          <span class="text-gray-300">Editar</span>
        </th>
        <th class="px-16 py-2">
          <span class="text-gray-300">Remover</span>
        </th>
      </tr>
      <tr
        class="bg-white border-4 border-gray-200"
        v-for="product in products"
        :key="product.id"
        slot="table-content"
      >
        <td class="px-16 py-2 text-center">{{ product.id }}</td>
        <td class="px-16 py-2 text-center">{{ product.name }}</td>
        <td class="px-16 py-2 text-center">{{ product.formate_price }}</td>
        <td class="px-16 py-2 text-center">{{ product.formate_weight }}</td>
        <td class="px-16 py-2 text-center">{{ product.stock }}</td>
        <td class="px-16 py-2 text-center">
          <RouterLink
            class="bg-yellow-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-yellow-500 hover:text-black "
            :to="{ name: 'update', params: { id: product.id } }"
          >
            Editar
          </RouterLink>
        </td>
        <td class="px-16 py-2 text-center">
          <button
            @click="destroy(product.id)"
            class="bg-red-500 text-white px-4 py-2 border rounded-md hover:bg-white hover:border-red-500 hover:text-black "
          >
            Remover
          </button>
        </td>
      </tr>
    </DataTable>

    <div v-if="spinner.get_products" class="text-center">
      <img src="@/assets/img/spinner.svg" alt="" class="inline-block w-5 h-5" />
    </div>
  </div>
</template>

<script>
import DataTable from "../components/Utils/DataTable.vue";
export default {
  name: "Home",
  components: {
    DataTable,
  },
  data() {
    return {
      newTodo: "",
      products: [],
      spinner: {
        get_products: false,
      },
    };
  },

  async created() {
    await this.getProducts();
  },

  methods: {
    async getProducts() {
      this.spinner.get_products = true;
      const { data: response } = await this.$axios.get("products");

      this.products = response.data;
      this.spinner.get_products = false;
    },

    async destroy(id) {
      this.spinner.get_products = true;
      const { data: response } = await this.$axios.delete(`products/${id}`);
      this.products = response.data;
      this.spinner.get_products = false;

      this.getProducts();
    },

    // createTodo() {
    //     if (!this.newTodo) { return; }

    //     const payload = {
    //         label: this.newTodo,
    //     };

    //     this.$axios.post('v1/products', payload).then((response) => {
    //         this.products.unshift({ ...response.data.data, state: 'show' });
    //         this.newTodo = '';
    //     });
    // },

    // afterDeleting(todo) {
    //     const idx = this.products.findIndex(o => o.id === todo.id);
    //     this.products.splice(idx, 1);
    // },
  },
};
</script>
