<script setup>
import CustomModal from '@/Components/CustomModal.vue';
import FilterDropdown from '@/Components/Shared/FilterDropdown.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm, router } from "@inertiajs/vue3";
import { ref, defineProps } from "vue";
import VueDatePicker from "@vuepic/vue-datepicker";


const props = defineProps({
    items: {
        type: Array,
        default: () => [],
    },
    categories: {
        type: Object,
        default: () => {},
    },

    errors: {
        type: Object,
        default: () => { },
    },
});


const showCreateModal = ref(false);
const form = useForm({
    name: "",
    description: "",
    quantity: "",
    image: "",
    inventory_id: null,
    date: null,
});


const handleFileChange = (e) => {
    form.image = e.target.files[0];
};

const handleCreate = () => {

    props.errors = null;

    router.post(route("items:store"), form.data(), {
        onSuccess: () => {
            showCreateModal.value = false;
            form.reset();
            successNotification('Successfully created the item');
        },
         onError: (errors) => {
                errorNotification("Something went wrong!");
            }
    });
};


// const allCategory = [...props.categories];

// const getSelectedCategory = (selectedCategoryName) => {

//     const selectedCategory = allCategory.find(category => category.name === selectedCategoryName);

//     // If selectedCategory is found, set its id to form.inventory_id
//     if (selectedCategory) {
//         form.inventory_id = selectedCategory.id;
//     }
// }

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
          <div class="flex justify-between w-full">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
            <VueDatePicker 
                    v-model="form.date"
                    range
                    :enable-time-picker="false"
                    :format="'yy/MM/dd'"
                    placeholder="select the date range"
                />
            <button @click="showCreateModal = true" class="btn-primary">
                Create
            </button>
          </div>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

    
    <CustomModal title="Create new leave request" :open="showCreateModal">
        <template #body>
            <!-- <FilterDropdown
                    class="text-sm"
                    :drop-down-data="allLeaveType"
                    :default="0"
                    @getFilterData="getSelectedType"
                /> -->

                <div>
                <input type="text" name="name" id="tag" class="border my-4 border-gray-400 rounded-md w-full p-2"
                    v-model="form.name" placeholder="Type your item name" />
            </div>
            <div class="text-xs text-red-500">
                <p v-if="errors.name" class="text-center mb-4" v-text="errors.name"></p>
            </div>
            <div>
                <textarea type="text" name="name" id="tag" class="border my-4 border-gray-400 rounded-md w-full p-2"
                    v-model="form.description" placeholder="Type your leave reason" />
            </div>
            <div class="text-xs text-red-500">
                <p v-if="errors.description" class="text-center mb-4" v-text="errors.description"></p>
            </div>
            <!-- <VueDatePicker 
                    v-model="form.date"
                    range
                    :enable-time-picker="false"
                    :format="'yy/MM/dd'"
                    placeholder="select the date range"
                /> -->
            <!-- <div>
                <input type="date" :min="new Date()"  name="name" id="tag" class="border my-4 border-gray-400 rounded-md w-full p-2"
                    v-model="form.date" placeholder="select the date" />
                    
            </div> -->
            <div>
                <input type="number" name="name" id="tag" class="border my-4 border-gray-400 rounded-md w-full p-2"
                    v-model="form.quantity" placeholder="Type your quantity" />
            </div>
            <div class="text-xs text-red-500">
                <p v-if="errors.quantity" class="text-center mb-4" v-text="errors.quantity"></p>
            </div>
            <div>
                <input type="file" @change="handleFileChange" class="border my-4 border-gray-400 rounded-md w-full p-2"/>
            </div>
            <div class="text-xs text-red-500">
                <p v-if="errors.image" class="text-center mb-4" v-text="errors.image"></p>
            </div>
            <div class="flex justify-center gap-5">
                <button @click="showCreateModal = false" class="btn-primary bg-red-500">
                    Cancel
                </button>

                <button @click="handleCreate" class="btn-primary">
                    Save
                </button>

            </div>
        </template>
    </CustomModal>
</template>
