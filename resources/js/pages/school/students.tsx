import React from 'react';
import { AppShell } from '@/components/app-shell';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { Input } from '@/components/ui/input';
import { 
  Users, 
  Search, 
  Plus, 
  Eye, 
  Edit, 
  Trash2, 
  Download,
  Filter,
  GraduationCap,
  Phone,
  Mail,
  Calendar
} from 'lucide-react';

interface Student {
  id: number;
  user: {
    id: number;
    name: string;
    email: string;
  };
  nis: string;
  nisn: string;
  schoolClass?: {
    name: string;
    level: string;
    major?: string;
  };
  status: string;
  enrollment_date: string;
  birth_date: string;
  parent_name: string;
  parent_phone: string;
}

interface Props {
  students: {
    data: Student[];
    current_page: number;
    last_page: number;
    total: number;
  };
  classes: Array<{
    id: number;
    name: string;
    level: string;
    major?: string;
  }>;
  [key: string]: unknown;
}

export default function Students({ students, classes }: Props) {
  const getStatusColor = (status: string) => {
    switch (status) {
      case 'active': return 'bg-green-100 text-green-700';
      case 'inactive': return 'bg-red-100 text-red-700';
      case 'graduated': return 'bg-blue-100 text-blue-700';
      case 'transferred': return 'bg-yellow-100 text-yellow-700';
      default: return 'bg-gray-100 text-gray-700';
    }
  };

  const getStatusText = (status: string) => {
    switch (status) {
      case 'active': return 'Aktif';
      case 'inactive': return 'Tidak Aktif';
      case 'graduated': return 'Lulus';
      case 'transferred': return 'Pindah';
      default: return status;
    }
  };

  return (
    <AppShell>
      <div className="p-6 space-y-6">
        {/* Header */}
        <div className="flex items-center justify-between">
          <div>
            <h1 className="text-3xl font-bold text-gray-900 flex items-center">
              <Users className="mr-3 h-8 w-8 text-blue-600" />
              Manajemen Siswa
            </h1>
            <p className="text-gray-600 mt-1">
              Kelola data siswa, kelas, dan informasi akademik
            </p>
          </div>
          <div className="flex items-center space-x-3">
            <Button variant="outline">
              <Download className="mr-2 h-4 w-4" />
              Export Data
            </Button>
            <Button>
              <Plus className="mr-2 h-4 w-4" />
              Tambah Siswa
            </Button>
          </div>
        </div>

        {/* Stats Cards */}
        <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
          <Card>
            <CardHeader className="pb-3">
              <div className="flex items-center justify-between">
                <CardTitle className="text-sm font-medium text-gray-600">
                  Total Siswa
                </CardTitle>
                <Users className="h-4 w-4 text-blue-600" />
              </div>
            </CardHeader>
            <CardContent>
              <div className="text-2xl font-bold">{students.total}</div>
              <p className="text-xs text-green-600">Terdaftar aktif</p>
            </CardContent>
          </Card>
          
          <Card>
            <CardHeader className="pb-3">
              <div className="flex items-center justify-between">
                <CardTitle className="text-sm font-medium text-gray-600">
                  Siswa Aktif
                </CardTitle>
                <GraduationCap className="h-4 w-4 text-green-600" />
              </div>
            </CardHeader>
            <CardContent>
              <div className="text-2xl font-bold">
                {students.data.filter(s => s.status === 'active').length}
              </div>
              <p className="text-xs text-green-600">Sedang belajar</p>
            </CardContent>
          </Card>

          <Card>
            <CardHeader className="pb-3">
              <div className="flex items-center justify-between">
                <CardTitle className="text-sm font-medium text-gray-600">
                  Total Kelas
                </CardTitle>
                <div className="h-4 w-4 bg-purple-100 rounded flex items-center justify-center">
                  <span className="text-xs text-purple-600 font-bold">{classes.length}</span>
                </div>
              </div>
            </CardHeader>
            <CardContent>
              <div className="text-2xl font-bold">{classes.length}</div>
              <p className="text-xs text-purple-600">Kelas tersedia</p>
            </CardContent>
          </Card>

          <Card>
            <CardHeader className="pb-3">
              <div className="flex items-center justify-between">
                <CardTitle className="text-sm font-medium text-gray-600">
                  Lulusan
                </CardTitle>
                <div className="h-4 w-4 bg-orange-100 rounded flex items-center justify-center">
                  <GraduationCap className="h-3 w-3 text-orange-600" />
                </div>
              </div>
            </CardHeader>
            <CardContent>
              <div className="text-2xl font-bold">
                {students.data.filter(s => s.status === 'graduated').length}
              </div>
              <p className="text-xs text-orange-600">Tahun ini</p>
            </CardContent>
          </Card>
        </div>

        {/* Filters and Search */}
        <Card>
          <CardContent className="p-4">
            <div className="flex flex-col md:flex-row md:items-center gap-4">
              <div className="flex-1">
                <div className="relative">
                  <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" />
                  <Input 
                    placeholder="Cari siswa berdasarkan nama, NIS, atau NISN..."
                    className="pl-10"
                  />
                </div>
              </div>
              <div className="flex items-center space-x-2">
                <Button variant="outline" size="sm">
                  <Filter className="mr-2 h-4 w-4" />
                  Filter Kelas
                </Button>
                <Button variant="outline" size="sm">
                  Status
                </Button>
              </div>
            </div>
          </CardContent>
        </Card>

        {/* Students List */}
        <Card>
          <CardHeader>
            <CardTitle>Daftar Siswa</CardTitle>
            <CardDescription>
              Menampilkan {students.data.length} dari {students.total} siswa
            </CardDescription>
          </CardHeader>
          <CardContent className="p-0">
            <div className="overflow-x-auto">
              <table className="w-full">
                <thead className="border-b bg-gray-50/50">
                  <tr>
                    <th className="text-left p-4 font-medium text-gray-600">Siswa</th>
                    <th className="text-left p-4 font-medium text-gray-600">NIS/NISN</th>
                    <th className="text-left p-4 font-medium text-gray-600">Kelas</th>
                    <th className="text-left p-4 font-medium text-gray-600">Orang Tua</th>
                    <th className="text-left p-4 font-medium text-gray-600">Status</th>
                    <th className="text-left p-4 font-medium text-gray-600">Tanggal Masuk</th>
                    <th className="text-left p-4 font-medium text-gray-600">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  {students.data.map((student) => (
                    <tr key={student.id} className="border-b hover:bg-gray-50/50">
                      <td className="p-4">
                        <div>
                          <div className="font-medium text-gray-900">
                            {student.user.name}
                          </div>
                          <div className="text-sm text-gray-500 flex items-center mt-1">
                            <Mail className="h-3 w-3 mr-1" />
                            {student.user.email}
                          </div>
                        </div>
                      </td>
                      <td className="p-4">
                        <div className="text-sm">
                          <div className="font-mono text-gray-900">NIS: {student.nis}</div>
                          <div className="font-mono text-gray-500">NISN: {student.nisn}</div>
                        </div>
                      </td>
                      <td className="p-4">
                        {student.schoolClass ? (
                          <div>
                            <div className="font-medium text-gray-900">
                              {student.schoolClass.name}
                            </div>
                            <div className="text-sm text-gray-500">
                              Kelas {student.schoolClass.level}
                              {student.schoolClass.major && ` - ${student.schoolClass.major}`}
                            </div>
                          </div>
                        ) : (
                          <Badge variant="outline">Belum ada kelas</Badge>
                        )}
                      </td>
                      <td className="p-4">
                        <div className="text-sm">
                          <div className="font-medium text-gray-900">
                            {student.parent_name}
                          </div>
                          <div className="text-gray-500 flex items-center mt-1">
                            <Phone className="h-3 w-3 mr-1" />
                            {student.parent_phone}
                          </div>
                        </div>
                      </td>
                      <td className="p-4">
                        <Badge variant="secondary" className={getStatusColor(student.status)}>
                          {getStatusText(student.status)}
                        </Badge>
                      </td>
                      <td className="p-4">
                        <div className="text-sm text-gray-600 flex items-center">
                          <Calendar className="h-3 w-3 mr-1" />
                          {new Date(student.enrollment_date).toLocaleDateString('id-ID')}
                        </div>
                      </td>
                      <td className="p-4">
                        <div className="flex items-center space-x-2">
                          <Button size="sm" variant="ghost">
                            <Eye className="h-4 w-4" />
                          </Button>
                          <Button size="sm" variant="ghost">
                            <Edit className="h-4 w-4" />
                          </Button>
                          <Button size="sm" variant="ghost" className="text-red-600 hover:text-red-700">
                            <Trash2 className="h-4 w-4" />
                          </Button>
                        </div>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
            
            {students.data.length === 0 && (
              <div className="text-center py-12">
                <Users className="h-12 w-12 text-gray-400 mx-auto mb-4" />
                <h3 className="text-lg font-medium text-gray-900 mb-2">Belum ada data siswa</h3>
                <p className="text-gray-500 mb-4">Mulai dengan menambahkan siswa pertama</p>
                <Button>
                  <Plus className="mr-2 h-4 w-4" />
                  Tambah Siswa
                </Button>
              </div>
            )}
          </CardContent>
        </Card>

        {/* Pagination */}
        {students.last_page > 1 && (
          <div className="flex items-center justify-between">
            <div className="text-sm text-gray-600">
              Halaman {students.current_page} dari {students.last_page}
            </div>
            <div className="flex items-center space-x-2">
              <Button variant="outline" size="sm" disabled={students.current_page === 1}>
                Sebelumnya
              </Button>
              <Button variant="outline" size="sm" disabled={students.current_page === students.last_page}>
                Selanjutnya
              </Button>
            </div>
          </div>
        )}
      </div>
    </AppShell>
  );
}