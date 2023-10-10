<template>
  <div class="form">
    <div class="form-container">
      <form @submit.prevent="handleSubmit">
        <h1>{{ id == 'add' ? 'ADD NEW PATIENT' : 'EDIT PATIENT INFORMATION' }}</h1>

        <div class="form-row">
          <div class="input-data">
            <input type="text" v-model="formData.name" @input="formData.name = formData.name.replace(/[^A-Za-z ]/g, '')"
              required />
            <div class="underline"></div>
            <label for="">Full Name</label>
          </div>
          <div class="input-data">
            <input type="text" v-model="formData.religion" required />
            <div class="underline"></div>
            <label for="">Religion</label>
          </div>
        </div>

        <div class="form-row">
          <div class="input-data">
            <input type="text" v-model="formData.phone" pattern="[0-9]*"
              @input="formData.phone = formData.phone.replace(/[^\d]/g, '').substr(0, 13)" required />
            <div class="underline"></div>
            <label for="">Phone Number</label>
          </div>
          <div class="input-data">
            <input type="text" v-model="formData.nik"
              @input="formData.nik = formData.nik.replace(/\D/g, '').substr(0, 16)" required />
            <div class="underline"></div>
            <label for="">NIK (16 digit Number)</label>
          </div>
        </div>

        <div class="form-row">
          <select name="sex" id="sex" v-model="formData.sex" class="input-data">
            <option value="">Select Gender</option>
            <option value="Male" :selected="formData.sex === 'Male'">Male</option>
            <option value="Female`" :selected="formData.sex === 'Female'">Female</option>
          </select>
          <div class="input-data">
            <input type="text" v-model="formData.address" required />
            <div class="underline"></div>
            <label for="">Adress</label>
          </div>
        </div>

        <div class="input-data">
          <button type="submit" class="submit">Submit</button>
        </div>

      </form>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from 'pinia';
import { usePatientStore } from '../stores/patient';
import Swal from 'sweetalert2';

export default {
  props: ['id'],
  data() {
    return {
      formData: {
        name: '',
        sex: '',
        religion: '',
        phone: '',
        address: '',
        nik: ''
      }
    };
  },
  computed: {
    ...mapState(usePatientStore, ["patientById"])
  },

  methods: {
    ...mapActions(usePatientStore, ["addPatient", "fetchPatientsDetail", "editPatient"]),
    handleSubmit() {
      let message = [];

      if (this.formData.sex === "") message.push("Please Select Your Gender")

      if (!/^08\d{10,13}$/.test(this.formData.phone)) message.push("Please Enter valid Phone Number ")

      if (!/^\d{16}$/.test(this.formData.nik)) message.push("Please Enter valid NIK")

      if (message.length > 0) {
        Swal.fire({
          icon: 'error',
          title: 'Check your input',
          text: message[0],
        });
        return;
      } else {
        if (this.id === 'add') {
          this.addPatient(this.formData).then((res) => {
            if (res) Swal.fire('success', `Patient ${this.formData.name} Added`, 'success')
            this.$router.back()
          })
        } else {
          this.editPatient(this.formData).then((res) => {
            if (res) Swal.fire('success', `Patient ${this.formData.name} Edited`, 'success')
            this.$router.back()
          })
        }
      }
    }
  },

  created() {
    if (this.id !== 'add') {
      this.fetchPatientsDetail(this.id).then(() => {
        this.formData = { ...this.patientById };
      });
    }
  }
};
</script>
