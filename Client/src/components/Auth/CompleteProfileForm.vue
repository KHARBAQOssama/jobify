<template>
  <form v-if="user.role.id == 2" @submit.prevent="handleSubmit" class="w-full py-4 gap-4 flex flex-col">
    <input
      @focus="setMessage({})"
      class="b bg-gray-100 p-3 w-full font-medium rounded-lg"
      v-model="profile.first_name"
      placeholder="First Name"
      type="text"
    />
    <input
      @focus="setMessage({})"
      class="b bg-gray-100 p-3 w-full font-medium rounded-lg"
      v-model="profile.last_name"
      placeholder="Last Name"
      type="text"
    />
    <input
      @focus="setMessage({})"
      class="b bg-gray-100 p-3 w-full font-medium rounded-lg"
      v-model="profile.occupation"
      placeholder="Your Job Post"
      type="text"
    />
    <input
      @focus="setMessage({})"
      class="b bg-gray-100 p-3 w-full font-medium rounded-lg"
      v-model="profile.birthday"
      placeholder="Your Job Post"
      type="date"
    />
    <button class="text-white p-3 rounded-lg bg-blue-400">Complete</button>
  </form>
  <form v-else @submit.prevent="handleSubmit" class="w-full py-4 gap-4 flex flex-col">
    <input
      @focus="setMessage({})"
      class="b bg-gray-100 p-3 w-full font-medium rounded-lg"
      v-model="profile.name"
      placeholder="Company Name"
      type="text"
    />
    <input
      @focus="setMessage({})"
      class="b bg-gray-100 p-3 w-full font-medium rounded-lg"
      v-model="profile.foundation_date"
      type="date"
    />
    <select
      @focus="setMessage({})"
      class="b bg-gray-100 p-3 w-full font-medium rounded-lg"
      v-model="profile.industry_id"
    >
        <option value="1">Mossi9a</option>
        <option value="0">Other</option>
    </select>
    <input
        v-if="profile.industry_id == 0"
      @focus="setMessage({})"
      class="b bg-gray-100 p-3 w-full font-medium rounded-lg"
      v-model="profile.new_industry"
      placeholder="Industry"
      type="text"
    />
    <button class="text-white p-3 rounded-lg bg-blue-400">Complete</button>
  </form>
</template>

<script>
import { mapGetters, mapMutations, mapActions } from "vuex";

export default {
  data() {
    return {};
  },
  computed: {
    ...mapGetters("userStore", { user: `getUser`, profile: `getProfile` })
  },
  created(){
    console.log(this.user,this.profile);
  },
  methods: {
    ...mapMutations("userStore", ["setUser", "setMessage","setProfile"]),
    ...mapActions("userStore", ["completeProfile"]),
    async handleSubmit() {
      this.setProfile(this.profile);
      let response = await this.completeProfile();
      if (response.status === 200) this.$router.push("/");
    }
  }
};
</script>

<style scoped>
form {
  min-width: 320px;
  max-width: 420px;
}
</style>