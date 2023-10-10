<template>
  <div class="home-container">
    <div class="headers">
      <h1>PATIENTS LISTS </h1>
      <span title="Add New Patient">
        <UserPlusIcon @click.prevent="addPatient()" class="add-icon icon" />
      </span>
    </div>
    <table>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Religion</th>
        <th>Actions </th>
      </tr>
      <tr v-for="(patient, index) in patients" :key="patient.id">
        <td data-cell="No">{{ index + 1 }}</td>
        <td data-cell="Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:">{{ patient.name }}</td>
        <td data-cell="Sex&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:">{{ patient.sex }}</td>
        <td data-cell="Address :">{{ patient.address }}</td>
        <td>
          <span title="Edit Patient">
            <PencilSquareIcon @click.prevent="editPatient(patient.id)" class="edit-icon icon" />
          </span>
          <span title="Detail Information">
            <InformationCircleIcon @click.prevent="detailPatient(patient.id)" class="info-icon icon" />
          </span>
          <span title="Delete Patient">
            <BackspaceIcon @click.prevent="deletePatient(patient.id)" class="delete-icon icon" />
          </span>

        </td>
      </tr>
    </table>
  </div>
</template>

<script>
import { mapActions, mapState } from 'pinia';
import { usePatientStore } from '../stores/patient';
import { UserPlusIcon, PencilSquareIcon, BackspaceIcon, InformationCircleIcon } from '@heroicons/vue/24/outline';

export default {
  components: {
    UserPlusIcon, PencilSquareIcon, BackspaceIcon, InformationCircleIcon
  },
  computed: {
    ...mapState(usePatientStore, ["patients"])
  },
  methods: {
    ...mapActions(usePatientStore, ["fetchPatients", "deletePatient"]),

    editPatient(id) {
      this.$router.push(`/form/${id}`)
    },

    addPatient() {
      this.$router.push(`/form/add`)
    },

    detailPatient(id) {
      this.$router.push(`/detail/${id}`)
    },

  },
  created() {
    this.fetchPatients();
  }
}
</script>
