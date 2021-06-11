<template>
  <!-- <div class="contacts-list">
    <ul>
      <li
        v-for="contact in sortedContacts"
        :key="contact.id"
        @click="selectContact(contact)"
        :class="{ selected: contact == selected }"
      >
        <div class="avatar">
          <img :src="contact.profile_image" :alt="contact.name" />
        </div>
        <div class="contact">
          <p class="name">{{ contact.name }}</p>
          <p class="email">{{ contact.email }}</p>
        </div>
        <span class="unread" v-if="contact.unread">{{ contact.unread }}</span>
      </li>
    </ul>
  </div> -->
  <section
    class="flex flex-col flex-none overflow-auto w-24 hover:w-64 group lg:max-w-sm md:w-2/5 transition-all duration-300 ease-in-out"
  >
    <div
      class="header p-4 flex flex-row justify-between items-center flex-none"
    >
      <div
        class="w-16 h-16 relative flex flex-shrink-0"
        style="filter: invert(100%)"
      >
        <img
          class="rounded-full w-full h-full object-cover"
          alt="ravisankarchinnam"
          src="https://avatars3.githubusercontent.com/u/22351907?s=60"
        />
      </div>
      <p class="text-md font-bold hidden md:block group-hover:block">
        Messenger
      </p>
      <a
        href="#"
        class="block rounded-full hover:bg-gray-700 bg-gray-800 w-10 h-10 p-2 hidden md:block group-hover:block"
      >
        <svg viewBox="0 0 24 24" class="w-full h-full fill-current">
          <path
            d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"
          />
        </svg>
      </a>
    </div>

    <!-- Search -->
    <div class="search-box p-4 flex-none">
      <form onsubmit="">
        <div class="relative">
          <label>
            <input
              class="rounded-full py-2 pr-6 pl-10 w-full border border-gray-800 focus:border-gray-700 bg-gray-800 focus:bg-gray-900 focus:outline-none text-gray-200 focus:shadow-md transition duration-300 ease-in"
              type="text"
              value=""
              placeholder="Search Messenger"
            />
            <span class="absolute top-0 left-0 mt-2 ml-3 inline-block">
              <svg viewBox="0 0 24 24" class="w-6 h-6">
                <path
                  fill="#bbb"
                  d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"
                />
              </svg>
            </span>
          </label>
        </div>
      </form>
    </div>

    <!-- List -->
    <div
      v-for="contact in sortedContacts"
      :key="contact.id"
      @click="selectContact(contact)"
      :class="{ selected: contact == selected }"
    >
      <div
        class="flex justify-between items-center p-3 hover:bg-gray-800 rounded-lg relative"
      >
        <div class="w-16 h-16 relative flex flex-shrink-0">
          <img
            class="shadow-md rounded-full w-full h-full object-cover"
            :src="contact.profile_image"
            :alt="contact.name"
          />
        </div>
        <div
          class="flex-auto min-w-0 ml-4 mr-6 hidden md:block group-hover:block"
        >
          <p>{{ contact.name }}</p>
          <div class="flex items-center text-sm text-gray-600">
            <div class="min-w-0">
              <p class="truncate">{{ contact.email }}</p>
            </div>
          </div>
        </div>
        <!-- <div
          v-if="contact.unread"
          class="bg-blue-700 w-3 h-3 rounded-full flex flex-shrink-0 hidden md:block group-hover:block"
        ></div> -->
        <span class="unread" v-if="contact.unread">{{ contact.unread }}</span>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    contacts: {
      type: Array,
      default: [],
    },
  },
  data() {
    return {
      selected: this.contacts.length ? this.contacts[0] : null,
    };
  },
  methods: {
    selectContact(contact) {
      this.selected = contact;
      this.$emit("selected", contact);
    },
  },
  computed: {
    sortedContacts() {
      return _.sortBy(this.contacts, [
        (contact) => {
          if (contact == this.selected) {
            return Infinity;
          }

          return contact.unread;
        },
      ]).reverse();
    },
  },
};
</script>

<style lang="scss" scoped>
span.unread {
  background: #82e0a8;
  color: #fff;
  position: absolute;
  right: 11px;
  top: 20px;
  display: flex;
  font-weight: 700;
  justify-content: center;
  align-items: center;
  line-height: 20px;
  font-size: 12px;
  padding: 0 4px;
  border-radius: 3px;
}
</style>