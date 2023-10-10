<template>
  <div class="form">
    <div class="form-container">
      <form>
        <h1>PATIENT INFORMATION</h1>

        <div class="form-row">
          <div class="input-data">
            <input type="text" :value="patientById?.name" disabled />
            <div class="underline"></div>
            <label for="">Full Name</label>
          </div>
          <div class="input-data">
            <input type="text" :value="patientById?.religion" disabled />
            <div class="underline"></div>
            <label for="">Religion</label>
          </div>
        </div>

        <div class="form-row">
          <div class="input-data">
            <input type="text" :value="patientById?.phone" disabled />
            <div class="underline"></div>
            <label for="">Phone Number</label>
          </div>
          <div class="input-data">
            <input type="text" :value="patientById?.nik" disabled />
            <div class="underline"></div>
            <label for="">NIK</label>
          </div>
        </div>

        <div class="form-row">
          <div class="input-data">
            <input type="text" :value="patientById?.sex" disabled />
            <div class="underline"></div>
            <label for="">Gender</label>
          </div>
          <div class="input-data">
            <input type="text" :value="patientById?.address" disabled />
            <div class="underline"></div>
            <label for="">Address</label>
          </div>
        </div>
        <ArrowUturnLeftIcon @click="goBack" class="add-icon icon" />

      </form>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from 'pinia';
import { usePatientStore } from '../stores/patient';
import { ArrowUturnLeftIcon } from '@heroicons/vue/24/outline';

export default {
  components: {
    ArrowUturnLeftIcon
  },
  props: ['id'],
  computed: {
    ...mapState(usePatientStore, ["patientById"])
  },

  methods: {
    ...mapActions(usePatientStore, ["fetchPatientsDetail"]),
    goBack() {
      this.$router.back()
    }
  },
  created() {
    this.fetchPatientsDetail(this.id)
  }
};
</script>

<style scoped>
.detail {
  width: 100%;
  max-width: 50rem;
  background-color: #f4f4f4;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 5px 4px rgba(91, 90, 90, 0.392);
}

ul {
  list-style: none;
  padding: 0;
}

ul span {
  padding: 0.4rem 0rem;
  font-size: 1.25rem;
  font-weight: 600;
}

li {
  margin-bottom: 10px;
}
</style>
