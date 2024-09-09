<template>
  <HEADER />

  <!-- Language Selection Dropdown -->
  <div class="mt-4">
    <label for="language-select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
      {{ $t('select_language') }}
    </label>
    <select
      id="language-select"
      v-model="selectedLanguage"
      @change="changeLanguage"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
    >
      <option value="en">English</option>
      <option value="ar">Arabic</option>
      <option value="ku">Kurdish</option>
    </select>
  </div>

  <!-- Product Table -->
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">{{ $t('product_name') }}</th>
          <th scope="col" class="px-6 py-3">{{ $t('description') }}</th>
          <th scope="col" class="px-6 py-3">{{ $t('location') }}</th>
          <th scope="col" class="px-6 py-3">{{ $t('price') }}</th>
          <th scope="col" class="px-6 py-3">{{ $t('state.active') }}</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="product in products"
          :key="product.id"
          class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
        >
          <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ product.name }}</td>
          <td class="px-6 py-4">{{ product.description }}</td>
          <td class="px-6 py-4">{{ product.location }}</td>
          <td class="px-6 py-4">{{ product.price }}</td>
          <td class="px-6 py-4">{{ product.state }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import HEADER from './header.vue';
import { useI18n } from 'vue-i18n';

// Vue I18n setup
const { locale } = useI18n();
const selectedLanguage = ref('en'); // Default language set to English
const products = ref([]);

// Function to change the language and fetch data accordingly
const changeLanguage = async () => {
  locale.value = selectedLanguage.value; // Update Vue I18n locale

  // Fetch data with the updated Accept-Language header
  await fetchData();

  // Update the document's language and direction
  document.documentElement.lang = selectedLanguage.value;
  document.documentElement.dir = selectedLanguage.value === 'ar' || selectedLanguage.value === 'ku' ? 'rtl' : 'ltr';
};

// Fetch data from the server with Accept-Language header set
const fetchData = async () => {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/data', {
      headers: {
        'Accept-Language': selectedLanguage.value,
      },
    });
    products.value = response.data.data; // Extract data from the response
  } catch (error) {
    console.error('Failed to fetch products:', error);
  }
};

// Fetch data initially when the component mounts
onMounted(fetchData);

// Initialize document language and direction
document.documentElement.lang = selectedLanguage.value;
document.documentElement.dir = selectedLanguage.value === 'ar' || selectedLanguage.value === 'ku' ? 'rtl' : 'ltr';
</script>

<style scoped>
/* Add styles if needed */
</style>
