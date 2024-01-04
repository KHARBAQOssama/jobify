<template>
  <div
    class="w-[50%] min-w-[300px] max-w-[500px] mx-auto bg-white flex flex-col items-center py-5 rounded-md"
  >
    <h1 class="max-w-[400px] text-start w-[90%] text-xl font-bold">We Still Need Some Info</h1>
    <form
      v-if="user.role.id == 2"
      @submit.prevent="handleSubmit"
      class="w-[90%] py-4 gap-4 flex flex-col"
    >
      <input
        @focus="setMessage({})"
        class="bg-white border focus:border-blue-600 max-w-[400px] m-auto p-3 w-full font-medium rounded-lg"
        v-model="employee_credentials.first_name"
        placeholder="First Name"
        type="text"
      />
      <input
        @focus="setMessage({})"
        class="bg-white border focus:border-blue-600 max-w-[400px] m-auto p-3 w-full font-medium rounded-lg"
        v-model="employee_credentials.last_name"
        placeholder="Last Name"
        type="text"
      />
      <input
        @focus="setMessage({})"
        class="bg-white border focus:border-blue-600 max-w-[400px] m-auto p-3 w-full font-medium rounded-lg"
        v-model="employee_credentials.occupation"
        placeholder="Your Job Post"
        type="text"
      />
      <label for class="max-w-[400px] text-gray-400 m-auto w-full">Birthday</label>
      <input
        @focus="setMessage({})"
        class="bg-white border focus:border-blue-600 max-w-[400px] m-auto p-3 w-full font-medium rounded-lg"
        v-model="employee_credentials.birthday"
        placeholder="Your Job Post"
        type="date"
      />
      <button
        class="text-white p-3 rounded-lg bg-blue-300 w-full max-w-[400px] m-auto hover:bg-blue-500"
      >Complete</button>
    </form>
    <form v-else @submit.prevent="handleSubmit" class="w-full py-4 gap-4 flex flex-col">
      <input
        @focus="setMessage({})"
        class="bg-white border focus:border-blue-600 max-w-[400px] m-auto p-3 w-full font-medium rounded-lg"
        v-model="company_credentials.name"
        placeholder="Company Name"
        type="text"
      />
      <label for class="max-w-[400px] text-gray-400 m-auto w-full">Foundation date</label>
      <input
        @focus="setMessage({})"
        class="bg-white border focus:border-blue-600 max-w-[400px] m-auto p-3 w-full font-medium rounded-lg"
        v-model="company_credentials.foundation_date"
        type="date"
      />
      <select
        @focus="setMessage({})"
        class="bg-white border focus:border-blue-600 max-w-[400px] m-auto p-3 w-full font-medium rounded-lg"
        v-model="company_credentials.industry_id"
      >
        <option value="undefined">Industry</option>
        <option value="1">Mossi9a</option>
        <option value="0">Other</option>
      </select>
      <input
        v-if="company_credentials.industry_id === 0"
        @focus="setMessage({})"
        class="bg-white border focus:border-blue-600 max-w-[400px] m-auto p-3 w-full font-medium rounded-lg"
        v-model="company_credentials.new_industry"
        placeholder="Industry"
        type="text"
      />
      <button
        class="text-white p-3 rounded-lg bg-blue-300 w-full max-w-[400px] m-auto hover:bg-blue-500"
      >Complete</button>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapMutations, mapActions } from "vuex";

export default {
  data() {
    return {
      company_credentials: {
        name: null,
        foundation_date: null,
        industry_id: null,
        new_industry: null
      },
      employee_credentials: {
        first_name: null,
        last_name: null,
        birthday: null,
        occupation: null
      }
    };
  },
  computed: {
    ...mapGetters("userStore", { user: `getUser`, profile: `getProfile` })
  },
  created() {
    console.log(this.user, this.profile);
  },
  methods: {
    ...mapMutations("userStore", ["setUser", "setMessage", "setProfile"]),
    ...mapActions("userStore", ["completeProfile"]),
    async handleSubmit() {
      // this.setProfile(this.profile);
      let response = await this.completeProfile(this.user.role.id == 2 ? this.employee_credentials : this.company_credentials);
      if (response.status === 200) this.$router.push("/");
    }
  }
};
</script>

<style scoped>
/* form {
  min-width: 320px;
  max-width: 420px;
} */
</style>