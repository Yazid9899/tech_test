import { defineStore } from "pinia";
import axios from "axios";
import Swal from "sweetalert2";

const BASE_URL = "http://localhost:8000";

export const usePatientStore = defineStore("patientStore", {
  state: () => ({
    patients: [],
    patientById: {},
  }),

  actions: {
    async fetchPatients() {
      try {
        const { data } = await axios.get(`${BASE_URL}/patients`);
        if (data) {
          this.patients = data.result;
        } else {
          console.error("Something went wrong while fetching data.");
        }
      } catch (error) {
        console.error("An error occurred while fetching data:", error);
      }
    },

    async fetchPatientsDetail(id) {
      try {
        const { data } = await axios.get(`${BASE_URL}/patients/${id}`);
        if (data) {
          this.patientById = data.result;
        } else {
          console.error("Something went wrong.");
        }
      } catch (error) {
        console.error("An error occurred:", error);
      }
    },

    async deletePatient(patientId) {
      try {
        const result = await Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        });

        if (result.isConfirmed) {
          Swal.fire("Deleted!", "Patient has been deleted.", "success");
          await axios.delete(`${BASE_URL}/patients/${patientId}`);
          this.fetchPatients();
        }
      } catch (error) {
        console.error("An error occurred while deleting the patient:", error);
      }
    },

    async addPatient(payload) {
      try {
        const rawData = JSON.stringify(payload);

        const { data } = await axios.post(`${BASE_URL}/patients`, rawData, {
          headers: {
            "Content-Type": "application/json",
          },
        });
        if (data.status.code === 201) {
          return true;
        }

        return false;
      } catch (error) {
        console.error(error);
      }
    },

    async editPatient(payload) {
      try {
        const rawData = JSON.stringify(payload);

        const { data } = await axios.patch(
          `${BASE_URL}/patients/${payload.id}`,
          rawData,
          {
            headers: {
              "Content-Type": "application/json",
            },
          }
        );
        if (data.status.code === 200) {
          return true;
        }

        return false;
      } catch (error) {
        console.error(error);
      }
    },
  },
});
