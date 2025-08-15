import React from 'react';
import { AppShell } from '@/components/app-shell';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';
import { Progress } from '@/components/ui/progress';
import {
  Users,
  GraduationCap,
  BookOpen,
  ClipboardList,
  TrendingUp,
  Calendar,
  Bell,
  Award,
  BarChart3,
  Clock
} from 'lucide-react';

interface Props {
  auth: {
    user: {
      id: number;
      name: string;
      email: string;
      role?: {
        name: string;
        display_name: string;
      };
    };
  };
  [key: string]: unknown;
}

export default function Dashboard({ auth }: Props) {
  const user = auth.user;
  const userRole = user.role?.name || 'student';

  // Mock data - would come from backend
  const stats = [
    {
      title: 'Total Siswa',
      value: '1,247',
      change: '+12%',
      icon: Users,
      color: 'text-blue-600',
      bgColor: 'bg-blue-100'
    },
    {
      title: 'Total Guru',
      value: '89',
      change: '+3%',
      icon: GraduationCap,
      color: 'text-green-600',
      bgColor: 'bg-green-100'
    },
    {
      title: 'Mata Pelajaran',
      value: '24',
      change: '0%',
      icon: BookOpen,
      color: 'text-purple-600',
      bgColor: 'bg-purple-100'
    },
    {
      title: 'Tugas Aktif',
      value: '156',
      change: '+8%',
      icon: ClipboardList,
      color: 'text-orange-600',
      bgColor: 'bg-orange-100'
    }
  ];

  const recentActivities = [
    {
      id: 1,
      type: 'assignment',
      title: 'Tugas Matematika - Aljabar Linear',
      description: 'Deadline dalam 2 hari',
      time: '2 jam yang lalu',
      status: 'urgent',
      icon: ClipboardList
    },
    {
      id: 2,
      type: 'announcement',
      title: 'Pengumuman Libur Semester',
      description: 'Informasi jadwal libur semester genap',
      time: '5 jam yang lalu',
      status: 'info',
      icon: Bell
    },
    {
      id: 3,
      type: 'grade',
      title: 'Nilai Ujian Fisika Telah Keluar',
      description: 'Rata-rata kelas: 8.5',
      time: '1 hari yang lalu',
      status: 'success',
      icon: Award
    },
    {
      id: 4,
      type: 'schedule',
      title: 'Perubahan Jadwal Kimia',
      description: 'Dipindah ke Rabu jam 10:00',
      time: '2 hari yang lalu',
      status: 'warning',
      icon: Calendar
    }
  ];

  const upcomingEvents = [
    {
      id: 1,
      title: 'Ujian Tengah Semester',
      date: 'Sen, 15 Jan 2024',
      time: '08:00 - 12:00',
      type: 'exam',
      color: 'bg-red-100 text-red-700'
    },
    {
      id: 2,
      title: 'Presentasi Proyek Akhir',
      date: 'Rab, 17 Jan 2024',
      time: '13:00 - 15:00',
      type: 'presentation',
      color: 'bg-blue-100 text-blue-700'
    },
    {
      id: 3,
      title: 'Rapat Orang Tua',
      date: 'Jum, 19 Jan 2024',
      time: '19:00 - 21:00',
      type: 'meeting',
      color: 'bg-green-100 text-green-700'
    }
  ];

  const getStatusColor = (status: string) => {
    switch (status) {
      case 'urgent': return 'bg-red-100 text-red-700 border-red-200';
      case 'warning': return 'bg-yellow-100 text-yellow-700 border-yellow-200';
      case 'success': return 'bg-green-100 text-green-700 border-green-200';
      case 'info': return 'bg-blue-100 text-blue-700 border-blue-200';
      default: return 'bg-gray-100 text-gray-700 border-gray-200';
    }
  };

  const getGreeting = () => {
    const hour = new Date().getHours();
    if (hour < 12) return '🌅 Selamat Pagi';
    if (hour < 17) return '🌞 Selamat Siang';
    if (hour < 21) return '🌆 Selamat Sore';
    return '🌙 Selamat Malam';
  };

  const getRoleSpecificContent = () => {
    switch (userRole) {
      case 'admin':
        return {
          welcomeMessage: 'Kelola sistem sekolah dengan dashboard admin lengkap',
          quickActions: [
            { title: 'Kelola Siswa', description: 'Tambah, edit, hapus data siswa', icon: Users },
            { title: 'Kelola Guru', description: 'Manajemen data guru dan staff', icon: GraduationCap },
            { title: 'Laporan Sistem', description: 'Lihat statistik dan laporan', icon: BarChart3 }
          ]
        };
      case 'teacher':
        return {
          welcomeMessage: 'Kelola kelas dan proses pembelajaran Anda',
          quickActions: [
            { title: 'Buat Tugas', description: 'Berikan tugas baru untuk siswa', icon: ClipboardList },
            { title: 'Input Nilai', description: 'Masukkan nilai ujian dan tugas', icon: Award },
            { title: 'Jadwal Mengajar', description: 'Lihat jadwal mengajar hari ini', icon: Calendar }
          ]
        };
      case 'parent':
        return {
          welcomeMessage: 'Pantau perkembangan akademik anak Anda',
          quickActions: [
            { title: 'Nilai Anak', description: 'Lihat progress akademik anak', icon: TrendingUp },
            { title: 'Jadwal Anak', description: 'Jadwal pelajaran dan kegiatan', icon: Calendar },
            { title: 'Komunikasi Guru', description: 'Hubungi guru mata pelajaran', icon: Users }
          ]
        };
      default: // student
        return {
          welcomeMessage: 'Akses materi pembelajaran dan tugas Anda',
          quickActions: [
            { title: 'Tugas Saya', description: 'Lihat dan kerjakan tugas', icon: ClipboardList },
            { title: 'Nilai & Rapor', description: 'Cek nilai dan progress', icon: Award },
            { title: 'Materi Pelajaran', description: 'Download materi dan video', icon: BookOpen }
          ]
        };
    }
  };

  const roleContent = getRoleSpecificContent();

  return (
    <AppShell>
      <div className="p-6 space-y-6">
        {/* Welcome Header */}
        <div className="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl p-6 text-white">
          <div className="flex items-center justify-between">
            <div>
              <h1 className="text-2xl font-bold mb-1">
                {getGreeting()}, {user.name}! 👋
              </h1>
              <p className="text-blue-100 mb-4">
                {roleContent.welcomeMessage}
              </p>
              <div className="flex items-center space-x-4">
                <Badge variant="secondary" className="bg-white/20 text-white border-white/30">
                  {user.role?.display_name || 'Siswa'}
                </Badge>
                <div className="flex items-center space-x-1 text-blue-100">
                  <Clock className="h-4 w-4" />
                  <span className="text-sm">
                    {new Date().toLocaleDateString('id-ID', { 
                      weekday: 'long', 
                      year: 'numeric', 
                      month: 'long', 
                      day: 'numeric' 
                    })}
                  </span>
                </div>
              </div>
            </div>
            <div className="hidden md:block">
              <div className="bg-white/10 p-4 rounded-lg">
                <GraduationCap className="h-12 w-12 text-white" />
              </div>
            </div>
          </div>
        </div>

        {/* Stats Overview */}
        {(userRole === 'admin' || userRole === 'teacher') && (
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {stats.map((stat, index) => (
              <Card key={index} className="hover:shadow-md transition-shadow">
                <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                  <CardTitle className="text-sm font-medium text-gray-600">
                    {stat.title}
                  </CardTitle>
                  <div className={`p-2 rounded-lg ${stat.bgColor}`}>
                    <stat.icon className={`h-4 w-4 ${stat.color}`} />
                  </div>
                </CardHeader>
                <CardContent>
                  <div className="text-2xl font-bold">{stat.value}</div>
                  <p className="text-xs text-green-600 flex items-center mt-1">
                    <TrendingUp className="h-3 w-3 mr-1" />
                    {stat.change} dari bulan lalu
                  </p>
                </CardContent>
              </Card>
            ))}
          </div>
        )}

        <div className="grid lg:grid-cols-3 gap-6">
          {/* Quick Actions */}
          <div className="lg:col-span-1">
            <Card>
              <CardHeader>
                <CardTitle className="flex items-center space-x-2">
                  <span>⚡</span>
                  <span>Aksi Cepat</span>
                </CardTitle>
                <CardDescription>
                  Akses fitur utama dengan satu klik
                </CardDescription>
              </CardHeader>
              <CardContent className="space-y-3">
                {roleContent.quickActions.map((action, index) => (
                  <Button
                    key={index}
                    variant="ghost"
                    className="w-full justify-start h-auto p-4 hover:bg-blue-50"
                  >
                    <action.icon className="h-5 w-5 mr-3 text-blue-600" />
                    <div className="text-left">
                      <div className="font-medium">{action.title}</div>
                      <div className="text-sm text-gray-500">{action.description}</div>
                    </div>
                  </Button>
                ))}
              </CardContent>
            </Card>
          </div>

          {/* Recent Activities */}
          <div className="lg:col-span-2">
            <Card>
              <CardHeader>
                <CardTitle className="flex items-center space-x-2">
                  <span>📋</span>
                  <span>Aktivitas Terbaru</span>
                </CardTitle>
                <CardDescription>
                  Update dan notifikasi terbaru sistem
                </CardDescription>
              </CardHeader>
              <CardContent>
                <div className="space-y-4">
                  {recentActivities.map((activity) => (
                    <div key={activity.id} className="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50">
                      <div className={`p-2 rounded-full ${getStatusColor(activity.status)} border`}>
                        <activity.icon className="h-4 w-4" />
                      </div>
                      <div className="flex-1 min-w-0">
                        <p className="text-sm font-medium text-gray-900">
                          {activity.title}
                        </p>
                        <p className="text-sm text-gray-500">{activity.description}</p>
                        <p className="text-xs text-gray-400 mt-1">{activity.time}</p>
                      </div>
                    </div>
                  ))}
                </div>
              </CardContent>
            </Card>
          </div>
        </div>

        {/* Upcoming Events */}
        <Card>
          <CardHeader>
            <CardTitle className="flex items-center space-x-2">
              <span>📅</span>
              <span>Agenda Mendatang</span>
            </CardTitle>
            <CardDescription>
              Kegiatan dan jadwal penting minggu ini
            </CardDescription>
          </CardHeader>
          <CardContent>
            <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
              {upcomingEvents.map((event) => (
                <div key={event.id} className="border rounded-lg p-4 hover:shadow-sm transition-shadow">
                  <div className="flex items-center justify-between mb-2">
                    <Badge variant="secondary" className={event.color}>
                      {event.type}
                    </Badge>
                    <Calendar className="h-4 w-4 text-gray-400" />
                  </div>
                  <h4 className="font-medium text-gray-900 mb-1">{event.title}</h4>
                  <p className="text-sm text-gray-600">{event.date}</p>
                  <p className="text-sm text-gray-500">{event.time}</p>
                </div>
              ))}
            </div>
          </CardContent>
        </Card>

        {/* Progress Overview for Students */}
        {userRole === 'student' && (
          <Card>
            <CardHeader>
              <CardTitle className="flex items-center space-x-2">
                <span>📈</span>
                <span>Progress Akademik</span>
              </CardTitle>
              <CardDescription>
                Ringkasan kemajuan belajar semester ini
              </CardDescription>
            </CardHeader>
            <CardContent>
              <div className="grid md:grid-cols-2 gap-6">
                <div>
                  <h4 className="font-medium mb-4">Nilai Rata-rata per Mata Pelajaran</h4>
                  <div className="space-y-3">
                    <div>
                      <div className="flex justify-between text-sm mb-1">
                        <span>Matematika</span>
                        <span>85/100</span>
                      </div>
                      <Progress value={85} className="h-2" />
                    </div>
                    <div>
                      <div className="flex justify-between text-sm mb-1">
                        <span>Bahasa Indonesia</span>
                        <span>92/100</span>
                      </div>
                      <Progress value={92} className="h-2" />
                    </div>
                    <div>
                      <div className="flex justify-between text-sm mb-1">
                        <span>Fisika</span>
                        <span>78/100</span>
                      </div>
                      <Progress value={78} className="h-2" />
                    </div>
                  </div>
                </div>
                <div>
                  <h4 className="font-medium mb-4">Kehadiran & Aktivitas</h4>
                  <div className="space-y-4">
                    <div className="flex items-center justify-between">
                      <span className="text-sm">Tingkat Kehadiran</span>
                      <Badge variant="secondary" className="bg-green-100 text-green-700">
                        95%
                      </Badge>
                    </div>
                    <div className="flex items-center justify-between">
                      <span className="text-sm">Tugas Diselesaikan</span>
                      <Badge variant="secondary" className="bg-blue-100 text-blue-700">
                        23/25
                      </Badge>
                    </div>
                    <div className="flex items-center justify-between">
                      <span className="text-sm">Rata-rata Nilai</span>
                      <Badge variant="secondary" className="bg-purple-100 text-purple-700">
                        8.5
                      </Badge>
                    </div>
                  </div>
                </div>
              </div>
            </CardContent>
          </Card>
        )}
      </div>
    </AppShell>
  );
}